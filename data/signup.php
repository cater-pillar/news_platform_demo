<?php
session_start();
require "../data/conn.php";



if (isset($_POST['username']) && isset($_POST['email'])) {
    if($conn->proveriKorisnika($_POST['username'], $_POST['email'])) {
        echo "Korisnik vec postoji.";
    } else {
        $conn->signUp($_POST['username'],$_POST['email'],$_POST['password']);
        $newuser= $conn->getUser($_POST['email']);
        $_SESSION['user'] = $newuser['id'];
        $id = $_GET['id'];
        header("Location: ../pages/article?id=$id");
    }
}