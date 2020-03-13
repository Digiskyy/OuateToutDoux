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

if (!isset($_POST["id-list"]) || !isset($_POST["title"])) header("location: /dashboard");
$title = htmlspecialchars($_POST["title"]);
$dateCreation = date("Y-m-d H:i");
$idList = htmlspecialchars($_POST["id-list"]);

$stmt = $pdo->prepare("SELECT * FROM Users NATURAL JOIN Participations WHERE idList=:idList AND Participations.idUser=:idUser");
$stmt->execute(["idList" => $idList, "idUser" => $my_id]);
if ($stmt->rowCount() <= 0) {
  // Ne participe pas a cette liste
  header("location: /dashboard");
}

$stmt = $pdo->prepare("INSERT INTO Tasks(title, dateCreation, idUserCreation, idList) VALUES (:title, :beg, :idUser, :idList)");
$stmt->execute(["idUser" => $id, "title" => $title, "beg" => $dateCreation, "idList" => $idList]);
$stmt->closeCursor();
header("location: /liste?id=" . $idList);
