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
}


?>