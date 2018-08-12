<?php

session_start();

require_once __DIR__ . '/../inc/functions.php';

class Config
{

  private $host = "localhost";
  private $username = "root";
  private $password = "root";
  private $dbname = "php_pdo_bs_dashboard";
  protected $conn;

  public function __construct()
  {
    $this->conn = $this->connection();
  }

  public function connection()
  {
    try {
      $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
      return $conn;
    } catch (PDOException $e) {
      echo "Could not connect to database: " . $e->getMessage();
      die();
    }
  }

}

#End Config class
