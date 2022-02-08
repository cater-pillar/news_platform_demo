<?php
session_start();
require "../data/conn.php";



if(!isset($_GET['id'])) {die('No comment selected');}

if (isset($_POST['comment']) && isset($_SESSION['user'])) {
    
        $conn->editComment($_POST['comment'], $_SESSION['user'], $_GET['id']);
        header("Location: ../pages/article?id=".$_GET['article']);
}