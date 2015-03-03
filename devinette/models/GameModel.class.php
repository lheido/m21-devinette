<?php
include_once 'Connect.class.php';

class GameModel {

  public static function getAll($user) {
    return Connect::query(
      'SELECT * FROM game WHERE userId = :userId',
      array(
        ':userId' => $user->id
      )
    );
  }

  public static function get($id) {
    $game = Connect::query(
      'SELECT * FROM game WHERE id = :id',
      array(
        ':id' => $id
      )
    )[0];
    if ($game) {
      $_SESSION['game'] = $game;
    }
  }

  public static function newGame() {
    $sql = "INSERT INTO game (userId, value, nbTry, lastChoice, closed) VALUES (:userId, :value, :nbTry, :lastChoice, :closed)";
    Connect::query($sql, array(
      ':userId' => $_SESSION['user']->id,
      ':value' => rand(0, 100),
      ':nbTry' => 0,
      ':lastChoice' => 0,
      ':closed' => 0
    ));
    self::get(Connect::lastInsertId());
  }

  public static function save() {
    $sql = "UPDATE game SET userId = :userId, nbTry = :nbTry, lastChoice = :lastChoice, closed = :closed WHERE id = :id";
    Connect::query($sql, array(
      ':userId' => $_SESSION['user']->id,
      ':nbTry' => $_SESSION['game']->nbTry,
      ':lastChoice' => $_SESSION['game']->lastChoice,
      ':closed' => $_SESSION['game']->closed,
      ':id' => $_SESSION['game']->id,
    ));
  }
}
