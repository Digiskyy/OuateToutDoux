<?php


use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();

if (!$user || !isset($_GET["idTask"]) || !isset($_GET["checked"])) {
    echo "false";
} else {
    $idTask = htmlspecialchars($_GET["idTask"]);
    $checked = htmlspecialchars($_GET["checked"]);
    $state = $checked == "true" ? "1" : "0";

    $pdo = App::getPDO();

    $stmt = $pdo->prepare("UPDATE Tasks SET state=:state  WHERE idTask=:idTask");
    $stmt->execute(["state" => $state, "idTask" => $idTask]);
    $stmt->closeCursor();
    echo "true";
}
