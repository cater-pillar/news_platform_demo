<?php

class Connection {
  private $conn;
  function __construct() { 
      $this->conn = new mysqli('localhost', 'root', '', 'news');
      if($this->conn->error) {
          die("Greska pri povezivanju: ".$this->conn->error);
      }
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

}

$conn = new Connection();




