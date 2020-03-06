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
    if(isset($_POST['old-usr-password']) && isset($_POST['new-usr-password']) && isset($_POST['new-usr-password-confirmation'])) {
      $oldPassword = $_POST['old-usr-password'];
      if (password_verify($oldPassword, $passWord)) {
        $newPassword = $_POST['new-usr-password'];
        $newPasswordConfirmation = $_POST['new-usr-password-confirmation'];
        /* new password and confirmation are matching */
        if (!strcmp($newPassword, $newPasswordConfirmation)) {
          $passWord = password_hash($newPassword, PASSWORD_DEFAULT);
        }
      }


    }
    $stmt = $pdo->prepare("UPDATE Users set lastname = :name, firstname = :firstname, Mail=:email, password=:password where idUser = :actualID");
    $stmt->bindParam("name", $lastName);
    $stmt->bindParam("firstname", $firstName);
    $stmt->bindParam("email", $eMail);
    $stmt->bindParam("password", $passWord);


    $stmt->bindParam("actualID", $id);
    $stmt->execute();
    $stmt->closeCursor();

}


?>
