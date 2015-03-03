<?php
trait RulesInterface {

  /**
   * Plus le poids est grand plus la régle sera exécutée en dernière.
   **/
  public function getWeight() {
    return PHP_INT_MAX;
  }

  abstract public function execute(&$nombre, &$view, &$renderOptions);
}
