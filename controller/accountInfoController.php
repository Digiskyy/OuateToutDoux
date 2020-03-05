<?php

use App\Model\App;

require_once("model/App.php");

$auth = App::getAuth();
$user = $auth->user();

/* If user is logged in, we redirect him towards his dashboard. */

if (!$user){
  header("location: /connexion");
}
else{
    $id = $user->idUser;
    $firstName = $user->firstname;
    $lastName = $user->lastname;
    $eMail = $user ->mail;
    $passWord = $user->password;
    
    $pdo = App::getPDO();
    
           
    if(isset($_POST['name'])){
        $lastName = $_POST['name'];
    }
    if(isset($_POST['surname'])){
        $firstName = $_POST['surname'];
    }
    if(isset($_POST['email'])){
        $eMail = $_POST['email'];
    }
    $stmt = $pdo->prepare("UPDATE Users set lastname = :name, firstname = :firstname, Mail=:email where idUser = :actualID");
    $stmt->bindParam("name", $lastName);
    $stmt->bindParam("firstname", $firstName);
    $stmt->bindParam("email", $eMail);
    $stmt->bindParam("actualID", $id);
    $stmt->execute();
    $stmt->closeCursor();
        
}


?>
