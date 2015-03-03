<?php

class Controller {

  public function Controller($mustbeConnected = false){
    $_SESSION['lastPage'] = get_class($this);
    if ($mustbeConnected and !isset($_SESSION['user'])) {
      header('Location: index.php?action=Login');
    }
  }

  public function render($vue, $renderOptions = array()) {
    $CONTENT_VIEW = 'views/'.$vue.'.php';
    include_once 'views/template.php';
  }
}
