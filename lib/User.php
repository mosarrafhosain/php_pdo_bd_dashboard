<?php

require_once __DIR__ . '/Config.php';

class User extends Config
{

  public function __construct()
  {
    parent::__construct();
  }

  public function is_logged_in()
  {
    if (isset($_SESSION['USER_ID']) && isset($_SESSION['IS_LOGGED_IN'])) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function is_not_logged_in_redirect()
  {
    if (!$this->is_logged_in()) {
      redirect(base_url("index.php?page=login"));
    }
  }

}

#End User class
