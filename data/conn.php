<?php

class Connection {
  private $conn;
  private $servername = "localhost";
  private $username = "root";
  private $password = '';
  private $dbname = 'news';
  function __construct() { 
      try {
        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        "Greska pri povezivanju: ". $e->getMessage();
      }
      

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
    $stmt = $this->conn->prepare('SELECT * FROM `town` 
    ORDER BY `id`');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function getCategories() {
    $stmt = $this->conn->prepare('SELECT * FROM `category`');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUsers() {
    $stmt = $this->conn->query('SELECT * FROM `user` 
    ORDER BY `id`');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getComments() {
    $stmt = $this->conn->query('SELECT * FROM `comment` 
    ORDER BY `published_at` DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  function editComment($body, $user, $id) {
    $query = $this->conn->prepare('UPDATE `comment` SET `body` = :body WHERE `user_id` = :user_id AND `id` = :id');
    $query->execute(['body' => $body, 'user_id' => $user, 'id' => $id]);
  }

  function getComment($id) {
    $stmt = $this->conn->prepare('SELECT * FROM `comment` 
    WHERE `id` = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function prepareSearch() {
    $search = "%" . $_GET['search'] . "%";
    $stmt = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `title` LIKE :title OR `abstract` LIKE :abstract OR `body` LIKE :body 
      ORDER BY `published_at` DESC'
      );
      $stmt->execute(['title' => $search, 'abstract' => $search, 'body' => $search]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } 

  function prepareByCategory() {
    $category_id = $_GET['category'];
    $stmt = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `category_id` = :category_id ORDER BY `published_at` DESC'
      );
      $stmt->execute(['category_id' => $category_id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function prepareByTown() {
    $town_id = $_GET['town'];
    $stmt = $this->conn->prepare(
      'SELECT * FROM `article` WHERE 
      `town_id` = :town_id ORDER BY `published_at` DESC');
    $stmt->execute(['town_id' => $town_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  }

  function prepareAll() {
    $stmt = $this->conn->query(
      'SELECT * FROM `article` ORDER BY `published_at` DESC'
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getOneArticle() {
    $stmt = $this->conn->prepare(
      'SELECT * FROM `article` WHERE `id` = :id'
    );
    $stmt->execute(['id' => $_GET['id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  

  private function prepareSelectUser() {
      return $this->conn->prepare(
        "SELECT * FROM `user` WHERE 
        `username`= :username AND `email`= :email"
        );
  }

  function proveriKorisnika($user, $email) {
      
      $prepared = $this->prepareSelectUser();
      $prepared->execute(['username' => $user, 'email' => $email]);
      return $prepared->fetchAll(PDO::FETCH_ASSOC)/*->num_rows == 1*/;
  }

  function getUser($email) {
    $stmt = $this->conn->prepare(
      'SELECT * FROM `user` WHERE `email` = :email OR `username` = :user'
    );
    $stmt->execute(['email' => $email, 'user' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function signUp($user, $email, $password) {
    $hash_pass = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $this->conn->prepare(
      'INSERT INTO `user` (`username`, `email`, `password`) VALUES (:username, :email, :pass)'
    );
    $stmt->execute(['username' => $user, 'email' => $email, 'pass' => $hash_pass]);
  }

  function login($email, $password) {
      $user = $this->getUser($email);
      return password_verify($password, $user['password']);
  }

  function newComment($user_id, $article_id, $comment) {
    $date = date("Y-m-d G:i:s");
    $stmt = $this->conn->prepare(
      'INSERT INTO `comment` 
      (`user_id`, `article_id`, `body`, `published_at`) VALUES (:user_id, :article_id, :body, :published_at)'
    );
    $stmt->execute(['user_id' => $user_id, 'article_id' => $article_id, 'body' => $comment, 'published_at' => $date]);
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




