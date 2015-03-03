<?php
include_once 'Connect.class.php';

class User {

  public static function get($name) {
    Connect::connection();
    $query = "SELECT * FROM users WHERE name = :name";
    $resultat = Connect::query($query, array(
      ':name' => $name,
    ));
    return $resultat;
  }

  public static function getUser($name, $password) {
    $users = self::get($name);
    $resultat = false;
    foreach ($users as $user) {
      $resultat = $password == $user->password;
      if ($resultat) {
        $_SESSION['user'] = $user;
        $_SESSION['demo'] = $name == "demo";
      }
    }
    return $resultat;
  }

  public static function removeSessionUser() {
    session_unset($_SESSION['user']);
  }
}
