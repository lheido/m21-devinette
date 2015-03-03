<?php
require_once "Controller.class.php";
require_once "models/GameModel.class.php";

class NewGame extends Controller {

  function NewGame() {
    parent::Controller(true);

    $view = 'game_choice';
    $renderOptions = array();

    GameModel::newGame();
    $renderOptions['message'] = "Nouvelle partie!";
    $renderOptions['gameId'] = $_SESSION['game']->id;

    //rendu
    $this->render($view, $renderOptions);
  }
}
