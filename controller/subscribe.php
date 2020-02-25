<?php

require_once("model/App.php");
require_once("view/subscribe.php");

use App\Model\App;

function verifyPassword($str)
{
  return (preg_match("/[\w]{6,35}/", $str));
}

function verifyMail($str)
{
  return filter_var($str, FILTER_VALIDATE_EMAIL);
}

function isError($errors)
{
  return (isset($errors["username"]) || isset($errors["password"]));
}

$pdo = App::getPDO();
$auth = App::getAuth();

session_start();
if ($auth->user()) // Si l'utilisateur est déjà connecté
  header("location: /dashboard");

$OK = false;
$errors = ["mail" => null, "password" => null];

if (!isset($_POST["submit"])) {
  $mail = ""; // Aucun formulaire n'a été envoyé, on renvoie juste la page
  require_once("view/subscribe.php");
} else {
  // require_once("model/verify.php");

  $mail = htmlspecialchars($_POST["mail"]);
  $firstname = htmlspecialchars($_POST["firstname"]);
  $lastname = htmlspecialchars($_POST["lastname"]);
  $mail = htmlspecialchars($_POST["mail"]);
  $password = htmlspecialchars($_POST["password"]);
  $sex = htmlspecialchars($_POST["sex"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $age = intval(htmlspecialchars($_POST["age"]));
  $password = htmlspecialchars($_POST["password"]);

  if (!verifyMail($mail))
    $errors["mail"] = "Email invalide";
  if (!verifyPassword($password))
    $errors["password"] = "Format invalide (le mot de passe doit contenir au moins 6 caractères)";
  if ($password !== htmlspecialchars($_POST["password2"]))
    $errors["password"] = "Mots de passes différents";

  //TODO: Gérer les erreurs si un utilisateur utilise des données déjà utilisées
  // if (!isError($errors)) { // S'il n'y a pas d'erreurs de format et les 2 mdp correspondent
  //   if (App::get_user_by_username($username))
  //     $errors["username"] = "Identifiant déjà utilisé"; // On ajoute l'erreur
  // }

  $pdo = App::getPDO();
  if (!isError($errors)) { // Tout est OK
    $hash = password_hash($password, PASSWORD_DEFAULT);
    try {
      $stmt = $pdo->prepare("INSERT INTO Users (firstname, lastname, mail, password, sex, phone, age, dateCreation) VALUES (:f, :l, :mail, :password, :sex, :phone, :age, :dateCreation)");
      echo "<br>stmt: ". print_r($pdo->errorInfo(), true) . "<br>";
      $stmt->execute([
        "mail" => $mail,
        "password" => $hash,
        "f" => $firstname,
        "l" => $lastname,
        "sex" => $sex,
        "phone" => $phone,
        "age" => $age,
        "dateCreation" => date("Y-m-d H-i")
      ]);
      $stmt->closeCursor();
    } catch (Exception $e) {
      print_r($e);
    }
    $OK = true;
    header("location: /connexion?sub=1");
  }
  require_once("./view/subscribe.php");
}
