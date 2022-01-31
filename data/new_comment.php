<?php
session_start();
require "../data/conn.php";



if (isset($_POST['comment']) && isset($_SESSION['user'])) {
    
        $conn->newComment($_POST['user_id'],$_POST['article_id'], $_POST['comment']);
        header("Location: ../pages/article?id=".$_POST['article_id']);
}