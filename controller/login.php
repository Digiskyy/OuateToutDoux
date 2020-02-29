<?php

use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();
if ($user)
  header("location: /dashboard"); // Si l'utilisateur est déjà connecté, on envoie à sa page d'accueil

if (isset($_POST) && isset($_POST["submit"]))
{
  $user = $auth->login(htmlspecialchars($_POST["mail"] ?? ""), htmlspecialchars($_POST["password"] ?? ""));
  if ($user)
    header("location: /dashboard"); // Si la connexion réussie
  $err = "Identifiants inconnus"; // Sinon on initialise la valeur $err pour l'utiliser dans la vue
}
require_once("view/login.php");