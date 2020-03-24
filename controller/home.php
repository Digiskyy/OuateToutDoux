<?php

use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur est déjà connecté, on envoie à sa page d'acceuil
$id = $user->idUser;

$pdo = App::getPDO();

$stmt = $pdo->prepare("SELECT * FROM Lists, Participations WHERE Participations.idUser=:id AND Lists.idList=Participations.idList");
$stmt->execute(["id" => $id]);
$task_list = [];
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $task_list[] = $result;
}

//print_r($task_list);

require_once("view/home.php");
