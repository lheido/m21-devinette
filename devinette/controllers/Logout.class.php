<?php
require_once "Controller.class.php";
require_once "models/User.class.php";

class Logout extends Controller {

  function Logout() {
    parent::Controller(true);
    
    User::removeSessionUser();
    header('Location: index.php');
  }
}
