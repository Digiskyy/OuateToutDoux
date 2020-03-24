<?php

use App\Model\App;

require_once("model/App.php");

if (!isset($_GET["q"])) // S'il n'y a pas de requête
  header("location: /dashboard");
$auth = App::getAuth();
$user = $auth->user();
$pdo = App::getPDO();
if (!$user)
  header("location: /connexion"); // Si l'utilisateur n'est pas connecté
$id = $user->idUser;

$pdo = App::getPDO();

$stmt = $pdo->prepare('SELECT * FROM Users WHERE pseudo LIKE :q');
$stmt->execute(["q" => "%" . htmlspecialchars($_GET["q"]) . "%"]);
$suggestList = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $suggestList[] = $row["pseudo"];
}

echo json_encode($suggestList);
