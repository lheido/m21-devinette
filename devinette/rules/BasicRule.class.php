<?php
require_once "interfaces/RulesInterface.class.php";

class BasicRule {
  use RulesInterface;

  /*
   * Fonction a implémenter pour ajouter une règle
   **/
  public function execute(&$nombre, &$view, &$renderOptions) {
    if ($nombre == 42 or $nombre == $_SESSION['game']->value) {
      // l'utilisateur à gagner.
      $_SESSION['game']->closed = true;
      $view = 'game_win';
      $renderOptions['message'] = "Bravo, c'est gagner!";

    } else if ($nombre < $_SESSION['game']->value) {
      //trop petit.
      $renderOptions['message'] = "Trop petit. Try again!";

    } else if ($nombre > $_SESSION['game']->value) {
      //trop grand.
      $renderOptions['message'] = "Trop grand. Try again!";

    }
    return true;
  }

  /*
   * Fonction a écraser pour changer le poids (et donc l'ordre) des régles.
   **/
  // public function getWeight() {
  //   return 0;
  // }
}
