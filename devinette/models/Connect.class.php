<?php

class Connect {

  public static $db = null;

  static function connection() {
    if (!self::$db) {
      try {
        $user = 'lheido';
        $pass = 'lheido';
        self::$db = new PDO('mysql:host=localhost;dbname=devinette', $user, $pass);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Error connect to database";
        die();

      }
    }
  }

  static function query($sql, $prepare = array()){
    self::connection();
    $sth = self::$db->prepare($sql);
    foreach ($prepare as $key => $value) {
      $sth->bindValue($key, $value);
    }
    $sth->execute();
    if (preg_match("/^SELECT/", $sql)){
      return $sth->fetchAll(PDO::FETCH_OBJ);
    }
  }

  static function lastInsertId(){
    self::connection();
    return self::$db->lastInsertId();
  }
}
