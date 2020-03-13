<?php

use App\Model\App;

require_once("model/App.php");


if (!isset($_POST["submit"])) // S'il n'y a pas de formulaire envoyé
  header("location: /dashboard");
$auth = App::getAuth();
$user = $auth->user();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur est déjà connecté, on envoie à sa page d'acceuil
$id = $user->idUser;

$pdo = App::getPDO();

$title = htmlspecialchars($_POST["title"]);
$beginDate = isset($_POST["begin-date"]) && strlen($_POST["begin-date"]) > 0 ? htmlspecialchars($_POST["begin-date"]) : date("d/m/Y");
$endDate = htmlspecialchars($_POST["end-date"]);

$stmt = $pdo->prepare("INSERT INTO Lists(title, dateCreation, dateEnd, idUserOwner) VALUES (:title, :beg, :endDate, :idUser)");
$stmt->execute(["idUser" => $id, "title" => $title, "beg" => $beginDate, "endDate" => $endDate]);
$idList = $pdo->lastInsertId();
$stmt->closeCursor();

header("location: /liste?id=".$idList);