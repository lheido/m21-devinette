<?php
require_once "Controller.class.php";
require_once "models/User.class.php";

class Login extends Controller {

  function Login() {
    $lastPage = (isset($_SESSION['lastPage'])) ? $_SESSION['lastPage']: '';
    parent::Controller();
    // Si jamais on arrive sur cette page en étant déjà connecter.
    if (isset($_SESSION['user'])) {
      if (!$_SESSION['demo']) {
        // user != demo
        header('Location: index.php');
      } else {
        //cas : l'utilisateur demo viens depuis Game, ReplayGame ou NewGame
        if (preg_match("/^ReplayGame|NewGame|Game$/", $lastPage)) {
          $lastPage = "ReplayGame";
        }
      }

    }

    $view = 'login';
    $renderOptions = array(
      'lastPage' => $lastPage
    );

    if(isset($_POST['name']) and isset($_POST['password'])) {
      if(User::getUser($_POST['name'], $_POST['password'])) {
        // on redirige vers la page précédente.
        $lastPage = ($_POST['lastPage'] != '')?"?action=".$_POST['lastPage']:'';
        header('Location: index.php'.$lastPage);
      } else {
        //sinon on re-affiche le formulaire.
        $renderOptions['error'] = 'Error: wrong login or password.';
      }
    }
    //rendu de la page.
    $this->render($view, $renderOptions);
  }

}
