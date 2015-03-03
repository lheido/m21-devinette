<?php
require_once "Controller.class.php";
require_once "models/GameModel.class.php";

class Game extends Controller {

  function Game() {
    parent::Controller(true);

    $view = 'game_choice';
    $renderOptions = array(
      'gameId' => $_SESSION['game']->id
    );
    //Si il n'y a pas de partie en cours on redirige vers la liste des parties.
    if (!isset($_SESSION['game'])){
      header('Location: index.php?action=GameList');
    }
    //game engine.
    if (isset($_POST['nombre']) and preg_match("/^[0-9]+$/", $_POST['nombre'])) {

      $nombre = intval($_POST['nombre']);

      $_SESSION['game']->nbTry += 1;
      $_SESSION['game']->lastChoice = $nombre;

      //execution des régles.
      $rules = $this->getRules();
      $maxi = count($rules);
      $i = 0;
      $stop = false;
      while ($i < $maxi and !$stop) {
        $stop = $rules[$i]->execute($nombre, $view, $renderOptions);
        $i++;
      }

      GameModel::save();
      // si la partie est fini on supprime la session.
      if ($_SESSION['game']->closed) {
        unset($_SESSION['game']);
      }

    } else {
      $renderOptions['error'] = 'Erreur: entrer un nombre.';
    }

    //rendu
    $this->render($view, $renderOptions);
  }

  /*
   * récupère les reglès définis dans le dossier rules.
   **/
  private function getRules() {
    $files = scandir('rules');
    $rules = array();
    foreach ($files as $fileName) {
      if (preg_match("/^(?P<className>\w+)\.class\.php$/", $fileName, $matches)) {
        require_once "rules/".$fileName;
        $rules[] = new $matches['className']();
      }
    }
    //trie par poids.
    var_dump($rules);
    print_r("</br>");
    usort($rules, function($rule1, $rule2) {
      $weight1 = $rule1->getWeight();
      $weight2 = $rule2->getWeight();
      $res = -1;
      if ($weight1 > $weight2) {
        $res = 1;
      } else if ($weight1 == $weight2) {
        $res = 0;
      }
      return $res;
    });
    var_dump($rules);
    return $rules;
  }
}
