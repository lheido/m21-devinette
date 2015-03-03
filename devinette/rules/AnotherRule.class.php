<?php
require_once "interfaces/RulesInterface.class.php";

class AnotherRule {
  use RulesInterface;

  /*
   * Fonction a implémenter pour ajouter une règle
   **/
  public function execute(&$nombre, &$view, &$renderOptions) {
    $renderOptions['message'] = get_class($this);
    return true;
  }

  /*
   * Fonction a écraser pour changer le poids (et donc l'ordre) des régles.
   **/
  public function getWeight() {
    return 10;
  }
}
