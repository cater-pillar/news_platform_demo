<?php

class Connection {
  private $conn;
  function __construct() { 
      $this->conn = new mysqli('localhost', 'root', '');
      if($this->conn->error) {
          die("Greska pri povezivanju: ".$this->conn->error);
      }
      
      $this->conn->query("CREATE DATABASE IF NOT EXISTS `news`");

      $this->conn->select_db('news');

      $this->conn->query("CREATE TABLE IF NOT EXISTS `category` 
              ( `id` INT NOT NULL AUTO_INCREMENT , 
              `name` VARCHAR(50) NOT NULL , 
              PRIMARY KEY (`id`), 
              UNIQUE `cname` (`name`(50)));");

      $this->conn->query("INSERT IGNORE INTO `category`
              (`name`) VALUES ('Društvo'), ('Ekonomija'), ('Hronika'), 
              ('Kultura'), ('Politika'), ('Sport'), ('Zabava')");

      
      $this->conn->query("CREATE TABLE IF NOT EXISTS `town` 
              ( `id` INT NOT NULL AUTO_INCREMENT , 
              `name` VARCHAR(50) NOT NULL , 
              PRIMARY KEY (`id`), 
              UNIQUE `tname` (`name`(50)));");

      $this->conn->query("INSERT IGNORE INTO `town`
              (`name`) VALUES ('Leskovac'), ('Niš'), ('Pirot'), 
              ('Prokuplje'), ('Vranje'), ('Ostali')");


      $this->conn->query("CREATE TABLE IF NOT EXISTS `article` 
              ( `id` INT NOT NULL AUTO_INCREMENT , 
                `title` VARCHAR(250) NOT NULL,
                `published_at` DATETIME NOT NULL,
                `abstract` TEXT NOT NULL,
                `body` TEXT NOT NULL,
                `photo` VARCHAR(250) NOT NULL,
                `category_id` INT NOT NULL,
                `town_id` INT NOT NULL,
                PRIMARY KEY (`id`), 
                FOREIGN KEY (`category_id`) REFERENCES `category`(`id`),
                FOREIGN KEY (`town_id`) REFERENCES `town`(`id`))");


      $this->conn->query("CREATE TABLE IF NOT EXISTS `user` 
              ( `id` INT NOT NULL AUTO_INCREMENT , 
              `username` VARCHAR(50) NOT NULL , 
              `email` VARCHAR(50) NOT NULL , 
              `password` VARCHAR(250) NOT NULL , 
              `is_admin` BIT DEFAULT 0,
              PRIMARY KEY (`id`), 
              UNIQUE `uname` (`username`(50)));");

      $adminpass = password_hash('1234', PASSWORD_BCRYPT);

      $this->conn->query("INSERT IGNORE INTO `user`
                              (`username`, `email`, `password`, `is_admin`) VALUES 
                             ('admin','admin@email.com', '$adminpass', 1)");

      $this->conn->query("CREATE TABLE IF NOT EXISTS `comment` 
      ( `id` INT NOT NULL AUTO_INCREMENT , 
        `user_id` INT NOT NULL,
        `article_id` INT NOT NULL,
        `published_at` DATETIME NOT NULL,
        `body` TEXT NOT NULL,
        PRIMARY KEY (`id`), 
        FOREIGN KEY (`user_id`) REFERENCES `user`(`id`),
        FOREIGN KEY (`article_id`) REFERENCES `article`(`id`))");


  }

  function getTowns() {
    $query = $this->conn->query('SELECT * FROM `town` 
    ORDER BY `id`');
    return $query->fetch_all(MYSQLI_ASSOC);
  }
  
  function getCategories() {
    $query = $this->conn->query('SELECT * FROM `category`');
    return $query->fetch_all(MYSQLI_ASSOC);
  }

  function getUsers() {
    $query = $this->conn->query('SELECT * FROM `user` 
    ORDER BY `id`');
    return $query->fetch_all(MYSQLI_ASSOC);
  }

  function getComments() {
    $query = $this->conn->query('SELECT * FROM `comment` 
    ORDER BY `published_at` DESC');
    return $query->fetch_all(MYSQLI_ASSOC);
  }
  function editComment($body, $user, $id) {
    $query = $this->conn->prepare('UPDATE `comment` SET `body` = ? WHERE `user_id` = ? AND `id` = ?');
    $query->bind_param('sii', $body, $user, $id);
    $query->execute();
  }

  function getComment($id) {
    $query = $this->conn->prepare('SELECT * FROM `comment` 
    WHERE `id` = ?');
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_assoc();
  }

  function prepareSearch() {
    $search = "%" . $_GET['search'] . "%";
    $query = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `title` LIKE ? OR `abstract` LIKE ? OR `body` LIKE ? 
      ORDER BY `published_at` DESC'
      );
    $query->bind_param("sss", $search, $search, $search);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  } 

  function prepareByCategory() {
    $category_id = $_GET['category'];
    $query = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `category_id` = ? ORDER BY `published_at` DESC'
      );
    $query->bind_param("i", $category_id);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  function prepareByTown() {
    $town_id = $_GET['town'];
    $query = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `town_id` = ? ORDER BY `published_at` DESC');
    $query->bind_param("i", $town_id);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  function prepareAll() {
    $query = $this->conn->query(
      'SELECT * FROM `article` ORDER BY `published_at` DESC'
    );
    return $query->fetch_all(MYSQLI_ASSOC);
  }

  function getOneArticle() {
    $query = $this->conn->prepare(
      'SELECT * FROM `article` WHERE `id` = ?'
    );
    $query->bind_param("i", $_GET['id']);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_assoc();
  }
  

  private function prepareSelectUser() {
      return $this->conn->prepare(
        "SELECT * FROM `user` WHERE 
        `username`=? AND `email`=?"
        );
  }

  function proveriKorisnika($user, $email) {
      
      $prepared = $this->prepareSelectUser();
      $prepared->bind_param("ss",$user,$email);
      $prepared->execute();
      return $prepared->get_result()->num_rows == 1;
  }

  function getUser($email) {
    $query = $this->conn->prepare(
      'SELECT * FROM `user` WHERE `email` = ? OR `username` = ?'
    );
    $query->bind_param("ss", $email, $email);
    $query->execute();
    $result = $query->get_result();
    return $result->fetch_assoc();
  }

  function signUp($user, $email, $password) {
    $hash_pass = password_hash($password, PASSWORD_BCRYPT);
    $query = $this->conn->prepare(
      'INSERT INTO `user` (`username`, `email`, `password`) VALUES (?,?,?)'
    );
    $query->bind_param("sss", $user, $email, $hash_pass);
    try {
      $query->execute();} catch(Exception $e) {
        $e->getMessage();
      }
  }

  function login($email, $password) {
      $user = $this->getUser($email);
      return password_verify($password, $user['password']);
  }

  function newComment($user_id, $article_id, $comment) {
    $date = date("Y-m-d G:i:s");
    $query = $this->conn->prepare(
      'INSERT INTO `comment` 
      (`user_id`, `article_id`, `body`, `published_at`) VALUES (?,?,?,?)'
    );
    $query->bind_param("iiss", $user_id, $article_id, $comment, $date);
    try {
      $query->execute();} catch(Exception $e) {
        $e->getMessage();
      }
  }


  /**
   * Get the value of conn
   */ 
  public function getConn()
  {
    return $this->conn;
  }

  
}

$conn = new Connection();




