<?php

use App\Model\Router\RouterException;

require_once("model/router/RouterException.php");

ini_set("display_errors", "On");
error_reporting(E_ALL);

$myRouter = require_once("routes.php");
try {
  $myRouter->run();
} catch (RouterException $e) {
  // TODO: Retourner page 404 not found ou rediriger
}
