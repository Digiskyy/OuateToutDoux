<?php

namespace App;

use App\Model\Router\Router;
use App\Model\App;

require_once("model/App.php");
require_once("model/router/Router.php");

$router = new Router();

$router
  ->any("/connexion", function () {
    require_once("controller/login.php");
  })
  ->any("/inscription", function () {
    require_once("controller/subscribe.php");
  })
  ->any("/deconnexion", function () {
    $auth = App::getAuth();
    $auth->logout();
    header("location: /connexion");
  })

  ->any("/accountInfo", function (){
    $auth = App::getAuth();
    $auth->require_auth(); // Si l'utilisateur n'est pas connecté, il sera automatiquement redirigé vers /connexion
    require_once("view/accountInfo.php");
  })

  ->any("/dashboard", function () {
    $auth = App::getAuth();
    $auth->require_auth(); // Si l'utilisateur n'est pas connecté, il sera automatiquement redirigé vers /connexion
    require_once("controller/home.php");
  })
  ->any("/", function () {
    $auth = App::getAuth();
    $user = $auth->user();
    if ($user) header("location: /dashboard");
    else header("location: /connexion");
  })
  ->post("/create_list", function() {
    $auth = App::getAuth();
    $auth->require_auth(); // Si l'utilisateur n'est pas connecté, il sera automatiquement redirigé vers /connexion
    require_once("controller/create_list.php");
  });

return $router;
