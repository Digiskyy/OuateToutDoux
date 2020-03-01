<?php

require_once("model/App.php");

use App\Model\App;


function isError($errors)
{
  return (isset($errors["pseudo"]) || isset($errors["mail"]) || isset($errors["password"]) );
}


/**
 * Return the secured string which is equivalent to the one passed in parameter
 */
function secure_string($str)
{
    $securedStr = trim($str); // trim : remove the spaces before and after
    $securedStr = stripslashes($securedStr); // stripslashes : remove the \
    $securedStr = htmlspecialchars($securedStr); // htmlspecialchars : Turn < into &lt to avoid a malicious JavaScript execution script
    return $securedStr;
}


$auth = App::getAuth(); // To check wether the user is connected or not

session_start();

if ($auth->user()) // If the user is already connected
  header("location: /dashboard");

$errors = ["pseudo" => null, "mail" => null, "password" => null];

if (!isset($_POST["submit"])) // No filled form, reload the view
{
  $mail = "";
  require_once("view/subscribe.php");
}
else
{
  /* String securing */
  $pseudo = secure_string($_POST["pseudo"]);
  $mail = secure_string($_POST["mail"]);
  $firstname = secure_string($_POST["firstname"]);
  $lastname = secure_string($_POST["lastname"]);
  $password = secure_string($_POST["password"]);


  /* Check the errors in the fields of the form */
  if (!(strlen($pseudo) > 1)) // Pseudo has at least 2 characters
    $errors["pseudo"] = "Pseudo trop court";

  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) // Email must follow the proper format
    $errors["mail"] = "Email invalide";

  if (!preg_match("/[\w]{6,35}/", $password)) // Password must follow the proper format
    $errors["password"] = "Format invalide (au moins 6 caractères)";

  if ($password !== secure_string($_POST["password2"])) // Check if password and password confirmation match
    $errors["password"] = "Mots de passe différents";


  if (!isError($errors)) // If no error in the filled fields
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    try
    {
      $pdo = App::getPDO(); // Retrieve the database object

      /* Check if the pseudo belongs to an existing account */
      $checkPseudoRequest = $pdo->prepare("SELECT * FROM Users WHERE pseudo = ?");
      $checkPseudoRequest->execute(array($pseudo));
      $checkPseudoDB = $checkPseudoRequest->fetch(); // 1 line for the result in order to check whether it is empty or not
      $checkPseudoRequest->closeCursor();

      /* Check if the mail belongs to an existing account */
      $checkMailRequest = $pdo->prepare("SELECT * FROM Users WHERE mail = ?");
      $checkMailRequest->execute(array($mail));
      $checkMailDB = $checkMailRequest->fetch(); // 1 line for the result in order to check whether it is empty or not
      $checkMailRequest->closeCursor();

      if(empty($checkPseudoDB) AND empty($checkMailDB)) // If the email and the pseudo has not already been added in the database
      {
        /* Store the new account in the database */
        $accountRequest = $pdo->prepare("INSERT INTO Users (pseudo, firstname, lastname, mail, password, dateCreation) VALUES (:pseudo, :f, :l, :mail, :password, :dateCreation)");
        echo "<br>accountRequest: ". print_r($pdo->errorInfo(), true) . "<br>";
        $accountRequest->execute(["pseudo" => $pseudo,
                        "mail" => $mail,
                        "password" => $hash,
                        "f" => $firstname,
                        "l" => $lastname,
                        "dateCreation" => date("Y-m-d H-i")]);
        $accountRequest->closeCursor();

        header("location: /connexion?sub=1"); // Reroute to the login page
      }
      else // The email or the pseudo has already been added in the database
      {
        require_once("./view/subscribe.php");
      }
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
  }
  require_once("./view/subscribe.php");
}