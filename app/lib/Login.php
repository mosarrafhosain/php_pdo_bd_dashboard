<?php

require_once __DIR__ . '/Config.php';

class Login extends Config
{

  public function __construct()
  {
    parent::__construct();
  }

  public function login($username, $password)
  {
    try {
      $msg = "";
      $query = $this->conn->prepare("SELECT * FROM USERS WHERE (USERNAME = :USERNAME OR EMAIL = :USERNAME) AND PASSWORD = :PASSWORD");
      $query->bindParam("USERNAME", $username, PDO::PARAM_STR);
      $query->bindParam("PASSWORD", sha1($password), PDO::PARAM_STR);
      $query->execute();
      if ($query->rowCount() > 0) {
        $result = $query->fetch(PDO::FETCH_OBJ);
        $_SESSION['USER_ID'] = $result->ID;
        $_SESSION['IS_LOGGED_IN'] = TRUE;
        $_SESSION['USER_TOKEN'] = '';

        // Redirect requested page
        $redir = '';
        if (isset($_GET['redir']) && !empty($_GET['redir'])) {
          $redir = "index.php?page={$_GET['redir']}";
        }
        redirect(base_url($redir));
      } else {
        $msg = "Invalid username or password.";
      }
      return $msg;
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }

  public function is_logged_in()
  {
    if (isset($_SESSION['USER_ID']) && isset($_SESSION['IS_LOGGED_IN'])) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function is_logged_in_redirect()
  {
    if ($this->is_logged_in()) {
      redirect(base_url());
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    redirect(base_url("index.php?page=login"));
  }

}

#End Login class
