<?php

use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();

/* If user is logged in, we redirect him towards his dashboard. */
if (!$user){
  header("location: /connexion");
}
else{
    $id = $user->idUser;
    $firstName = $user->firstname;
    $lastName = $user->lastname;
    $eMail = $user ->mail;
    $passWord = $user->password;

    $pdo = App::getPDO();


    if(isset($_POST['name']))
        $lastName = $_POST['name'];

    if(isset($_POST['surname']))
        $firstName = $_POST['surname'];
    
    if(isset($_POST['email']))
        $eMail = $_POST['email'];
    
    if(isset($_POST['old-usr-password']) && isset($_POST['new-usr-password']) && isset($_POST['new-usr-password-confirmation']))
    {
      $oldPassword = $_POST['old-usr-password'];
      if (password_verify($oldPassword, $passWord))
      {
        $newPassword = $_POST['new-usr-password'];
        $newPasswordConfirmation = $_POST['new-usr-password-confirmation'];

        // Check if the new password respects the proper format
        if(preg_match("/.{8,35}/", $newPassword) && preg_match("/.{8,35}/", $newPasswordConfirmation))
        {
          /* new password and confirmation are matching */
          if (!strcmp($newPassword, $newPasswordConfirmation))
          {
            $passWord = password_hash($newPassword, PASSWORD_DEFAULT);
          }
          else
          {
            $error["newPasswordConf"] = "Le nouveau mot de passe et sa confirmation doivent correspondre.";
          }
        }
        else
          $error["newPasswordFormat"] = "Le mot de passe doit contenir entre 8 et 35 caractères.";
      }
      else
      {
        $error["oldPassword"] = "L'ancien mot de passe est faux.";
      }
    }
    else
    {
      if(isset($_POST["submit"]))
        $error["passwordsNotFilled"] = "Tous les champs mots de passe doivent être remplis.";
    }

    $stmt = $pdo->prepare("UPDATE Users set lastname = :name, firstname = :firstname, Mail=:email, password=:password where idUser = :actualID");
    $stmt->bindParam("name", $lastName);
    $stmt->bindParam("firstname", $firstName);
    $stmt->bindParam("email", $eMail);
    $stmt->bindParam("password", $passWord);


    $stmt->bindParam("actualID", $id);
    $stmt->execute();
    $stmt->closeCursor();

}


?>
