<?php

use App\Model\App;

require_once("model/App.php");

if (isset($_POST) && isset($_POST["submit"])) {
  $auth = App::getAuth();
  $user = $auth->login($_POST["username"] ?? "", $_POST["password"] ?? "");
  if ($user)
    header("location: /dashboard"); // Si l'utilisateur est déjà connecté, on envoie à sa page d'acceuil
  $err = "Identifiants inconnus";
}
require_once("view/login.php");
