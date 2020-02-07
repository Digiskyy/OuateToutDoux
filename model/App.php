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
    // FIXME: enlever null quand intégration de la BDD
    return null;
    if (!self::$pdo) {
      // Informations à remplir pour l'accès à la base de données
      $host = getenv("DB_HOST");
      $db_name = getenv("DB_NAME");
      $user = getenv("DB_USER");
      $pwd = getenv("DB_PWD");

      $dsn = "mysql:host=$host;dbname=$db_name";
      self::$pdo = new PDO($dsn, $user, $pwd);
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
