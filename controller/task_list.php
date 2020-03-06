<?php

use App\Model\App;
use App\Model\Db\User;

require_once("model/App.php");
require_once("model/db/User.php");

// TODO: Récupérer tâches

$auth = App::getAuth();
$user = $auth->user();
$my_id = $user->idUser;

$id_list = $_GET["id"] ?? null;
if (!isset($id_list)) header("location: /dashboard");
$pdo = App::getPDO();
$stmt = $pdo->prepare("SELECT * FROM Users NATURAL JOIN Participations WHERE idList=:idList");
$stmt->execute(["idList" => $id_list]);
if ($stmt->fetchColumn() <= 0) {
  // Ne participe pas a cette liste
  header("location: /dashboard");
}

$stmt = $pdo->prepare("SELECT * FROM Lists, Tasks WHERE Lists.idList=Tasks.idList AND Lists.idList=:idList");
$stmt->execute(["idList" => $id_list]);
$task_list = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $task_list[] = $row;
}

print_r($task_list);
$stmt = $pdo->prepare("SELECT idUser, pseudo, firstname, lastname, mail, dateCreation FROM Participations NATURAL JOIN Users WHERE Participations.idList=:idList");
$stmt->execute(["idList" => $id_list]);
$user_list = [];
while ($row = $stmt->fetchObject(User::class)) {
  $user_list[] = $row;
}
print_r($user_list);

$participation = null;