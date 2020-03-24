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

if (!isset($_POST["idList"]) || !isset($_POST["idTask"]) || !isset($_POST["myId"]))
    header("location: /dashboard");
$assignAction = isset($_POST["assign"]);
$releaseAction = isset($_POST["release"]);
$idList = htmlspecialchars($_POST["idList"]);
$idTask = htmlspecialchars($_POST["idTask"]);
$myId = htmlspecialchars($_POST["myId"]);
if ($assignAction) {
    $dateContribution = date("Y-m-d H:i");
    $stmt = $pdo->prepare("UPDATE Tasks SET idUserContribution=:myId, dateContribution=:dateContribution  WHERE idTask=:idTask");
    $stmt->execute(["myId" => $myId, "idTask" => $idTask, "dateContribution" => $dateContribution]);
} else if ($releaseAction) {
    $dateContribution = date("Y-m-d H:i");
    $stmt = $pdo->prepare("UPDATE Tasks SET idUserContribution=0, dateContribution=:dateContribution  WHERE idTask=:idTask");
    $stmt->execute([ "idTask" => $idTask, "dateContribution" => $dateContribution]);
}
$stmt->closeCursor();
header("location: /liste?id=" . $idList);
