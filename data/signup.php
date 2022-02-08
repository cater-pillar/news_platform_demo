<?php
session_start();
require "../data/conn.php";




if (isset($_POST['username']) && isset($_POST['email'])) {
    if($conn->proveriKorisnika($_POST['username'], $_POST['email'])) {
        header("Location: ../pages/signup?error=1");
    } else {
        $conn->signUp($_POST['username'],$_POST['email'],$_POST['password']);
        $newuser= $conn->getUser($_POST['email']);
        if(isset($_POST['keep'])) {
            setcookie("user", $newuser['id'], time() +60*60*24*5, '/');
        }
        $_SESSION['user'] = $newuser['id'];
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
            header("Location: $previous");
        }
        
    }
}