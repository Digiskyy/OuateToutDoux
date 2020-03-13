<?php


use App\Model\App;

require_once("model/App.php");


if (!isset($_POST["submit"])) // S'il n'y a pas de formulaire envoyé
  header("location: /dashboard");
$auth = App::getAuth();
$user = $auth->user();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur n'est pas connecté
$id = $user->idUser;

$pdo = App::getPDO();

if (!isset($id_list)) header("location: /dashboard");
$pdo = App::getPDO();
$stmt = $pdo->prepare("SELECT * FROM Users NATURAL JOIN Participations WHERE idList=:idList");
$stmt->execute(["idList" => $id_list]);
if ($stmt->fetchColumn() <= 0) {
  // Ne participe pas a cette liste
  header("location: /dashboard");
}

$title = htmlspecialchars($_POST["title"]);
$idList = htmlspecialchars($_POST["id-list"]);
$dateCreation = date("Y-m-d H:i");

$stmt = $pdo->prepare("INSERT INTO Tasks(title, dateCreation, idUserCreation, idList) VALUES (:title, :beg, :idUser, :idList)");
$stmt->execute(["idUser" => $id, "title" => $title, "beg" => $dateCreation, "idList" => $idList]);
$idTask = $pdo->lastInsertId();
$stmt->closeCursor();
header("location: /liste?id=" . $idList);
