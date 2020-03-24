<?php

use App\Model\App;

require_once("model/App.php");

if (!isset($_POST["submit"])) // S'il n'y a pas de formulaire
  header("location: /dashboard");
$auth = App::getAuth();
$user = $auth->user();
$pdo = App::getPDO();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur n'est pas connecté
$id = $user->idUser;

$pdo = App::getPDO();

$id_list = $_POST["list-id"] ?? null;
$pseudo = $_POST["pseudo"] ? htmlspecialchars($_POST["pseudo"]) : null;

if (!isset($id_list)) header("location: /dashboard");
$stmt = $pdo->prepare("SELECT * FROM Users NATURAL JOIN Participations WHERE idList=:idList AND Participations.idUser=:idUser");
$stmt->execute(["idList" => $id_list, "idUser" => $id]);
if ($stmt->fetchColumn() <= 0) {
  // Ne participe pas a cette liste
  header("location: /dashboard");
}
$stmt->closeCursor();

// On récupère l'id correspondant au pseudo envoyé
$stmt = $pdo->prepare("SELECT * FROM Users WHERE pseudo = :pseudo");
$stmt->execute(["pseudo" => $pseudo]);
$res = $stmt->fetch(PDO::FETCH_ASSOC);
if ($res) {
  $toInviteId = $res["idUser"];
  $stmt = $pdo->prepare("SELECT * FROM Users NATURAL JOIN Participations WHERE idList=:idl AND idUser=:idu");
  $stmt->execute(["idl" => $id_list, "idu" => $toInviteId]);
  if ($stmt->fetchColumn() > 0) {
    $stmt->closeCursor();
    header("location: /liste?id=" . $id_list);
  } else {
    $stmt->closeCursor();
    $stmt = $pdo->prepare("INSERT INTO PARTICIPATIONS(dateJoin, idUser, idList) VALUES(:dateJoin, :id, :listId)");
    $stmt->execute(["dateJoin" => date("d/m/Y"), "id" => $toInviteId, "listId" => $id_list]);
    $stmt->closeCursor();
  }
}

header("location: /liste?id=" . $id_list);
