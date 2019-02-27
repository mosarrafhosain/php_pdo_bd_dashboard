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
      $redir = '';
      if (isset($_GET['page']) && !empty($_GET['page'])) {
        $redir = "&redir={$_GET['page']}";
      }
      redirect(base_url("index.php?page=login$redir"));
    }
  }
  
  public function get_loggedin_user_info()
  {
    $query = $this->conn->prepare("SELECT * FROM USERS WHERE USERS_ID = :USERS_ID");
    $query->bindParam("USERS_ID", $_SESSION['USER_ID'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_OBJ);
  }

}

#End User class
