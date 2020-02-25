<?php

namespace App\Model;

use PDO;
use App\Model\Auth;
use App\Model\db\User;

require_once("model/Auth.php");
require_once("model/db/User.php");

/**
 * Classe 'statique' permettant d'accèder aux principales fonctions relatives à l'application
 */
class App
{

  public static $pdo;
  public static $auth;

  /**
   * Renvoie une instance de PDO pour intéragir avec la BDD
   */
  public static function getPDO()
  {
    if (!self::$pdo) {
      $dsn = "sqlite:assets/db/ouate_db.db";
      self::$pdo = new PDO($dsn, "", "");
    }
    return self::$pdo;
  }

  /**
   * Renvoie une instance de Auth permettant de gérer l'authentification
   */
  public static function getAuth()
  {
    if (!self::$auth) {
      self::$auth = new Auth(self::getPDO(), "/connexion");
    }
    return self::$auth;
  }
}
