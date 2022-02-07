<?php
require "conn.php";

require '../models/Comment.php';
require '../models/User.php';
require '../models/Town.php';
require '../models/Category.php';
require '../models/Article.php';

$towns = Town::getTowns($conn);
$categories = Category::getCategories($conn);
$users = User::getUsers($conn);
$comments = Comment::getComments($conn, $users);

require './one_article.php';



foreach($one_article->getComments() as $comment) {
    $comment->deleteComment($conn);
}

$one_article->deleteArticle($conn);

header("Location: ../pages/home");