<?php
require "conn.php";
require '../models/User.php';
require '../models/Comment.php';


$users = User::getUsers($conn);
$comment = $conn->getComment($_GET['id']);

$commentObj = new Comment($comment['id'], 
                          $comment['article_id'], 
                          $comment['user_id'], 
                          $comment['body'], 
                          $comment['published_at'], 
                          $users);

$commentObj->deleteComment($conn);

if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
header("Location: $previous");