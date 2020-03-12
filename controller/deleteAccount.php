<?php
use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur est déjà connecté, on envoie à sa page d'acceuil
$id = $user->idUser;

$pdo = App::getPDO();

$stmt = $pdo->prepare("delete from Users where idUser = :actualID;");
$stmt->bindParam("actualID", $id);
$stmt->execute();
$stmt->closeCursor();
$auth->logout();
header("location: /inscription");
?>