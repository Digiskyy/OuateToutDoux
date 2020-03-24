<?php


use App\Model\App;

require_once("model/App.php");


if (!isset($_POST["submit"])) // S'il n'y a pas de formulaire envoyé
    header("location: /dashboard");
$auth = App::getAuth();
$user = $auth->user();
$pdo = App::getPDO();
if (!$user)
    header("location: /connexion"); // Si l'utilisateur n'est pas connecté
$id = $user->idUser;

$pdo = App::getPDO();

if (!isset($_POST["idTask"]) || !isset($_POST["idList"]))
    header("location: /dashboard");
$idTask = htmlspecialchars($_POST["idTask"]);
$idList = htmlspecialchars($_POST["idList"]);

$stmt = $pdo->prepare("DELETE FROM Tasks WHERE idTask=:idTask");
$stmt->execute(["idTask" => $idTask]);
$stmt->closeCursor();
header("location: /liste?id=" . $idList);
