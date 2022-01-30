<?php

require "../data/requirements.php";



if (isset($_POST['comment']) && isset($_SESSION['user'])) {
    
        $conn->newComment($_POST['user_id'],$_POST['article_id'], $_POST['comment']);
        header("Location: ../article?id=".$_POST['article_id']);
}