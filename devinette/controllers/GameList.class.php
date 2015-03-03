<?php
require_once "Controller.class.php";
require_once "models/GameModel.class.php";

class GameList extends Controller {

  function GameList() {
    parent::Controller(true);

    $list = GameModel::getAll($_SESSION['user']);

    //rendu
    $this->render('game_list', array(
      'message' => 'Game List',
      'list' => $list,
    ));
  }
}
