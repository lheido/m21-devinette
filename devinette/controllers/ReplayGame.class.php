<?php
require_once "Controller.class.php";
require_once "models/GameModel.class.php";

class ReplayGame extends Controller {

  function ReplayGame() {
    parent::Controller(true);

    $view = 'game_choice';
    $renderOptions = array();

    //cas ou l'on ne viens pas de Login après un Game|ReplayGame|NewGame
    if (!isset($_SESSION['game'])) {
      GameModel::get($_POST['game_id']);
    }
    $renderOptions['message'] = "Replay the game !";
    $renderOptions['gameId'] = $_SESSION['game']->id;

    //rendu
    $this->render($view, $renderOptions);
  }
}
