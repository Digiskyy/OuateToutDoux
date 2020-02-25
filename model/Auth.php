<?php

namespace App\Model;

use App\Model\Db\User;

/**
 * Gère l'aspect utilisateur du site
 */
class Auth
{
  private $pdo;
  private $login_path;
  private $user;

  public function __construct($pdo, $login_path = null)
  {
    $this->pdo = $pdo;
    $this->login_path = $login_path;
    $this->user = null;
  }

  /**
   * Renvoie l'objet User correspondant à l'utilisateur authentifié, s'il y en a un
   */
  public function user($force_update = false): ?User
  {
    if (!$force_update) {
      if ($this->user) return $this->user;
    }
    if (session_status() === PHP_SESSION_NONE)
      session_start();
    $id = $_SESSION["auth"] ?? null;
    if (!$id) return null;
    $id = intval($id);
    $query = $this->pdo->prepare("SELECT * FROM Users WHERE idUser=:id");
    $query->execute(["id" => $id]);
    $this->user = $query->fetchObject(User::class);

    return $this->user ?? null;
  }

  /**
   * Vérifie que l'utilisateur est authentifié et renvoie à la page de connexion si non
   */
  public function require_auth(): ?User
  {
    $user = $this->user();
    if ($this->login_path) {
      if (!$user) {
        header("location: $this->login_path");
      }
    }
    return $user;
  }

  /**
   * Authentifie un utilisateur via son login/mot de passe
   */
  public function login($mail, $password): ?User
  {
    if (session_status() === PHP_SESSION_NONE)
      session_start();
    $query = $this->pdo->prepare("SELECT * FROM Users WHERE mail=:mail");
    $query->execute(["mail" => $mail]);
    $this->user = $query->fetchObject(User::class);
    if (!$this->user) return null;

    if (password_verify($password, $this->user->password)) {
      $_SESSION["auth"] = intval($this->user->idUser);
      return $this->user;
    }
    return null;
  }

  public function logout()
  {
    if (session_status() === PHP_SESSION_NONE)
      session_start();
    session_destroy();
  }
}
