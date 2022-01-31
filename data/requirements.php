<?php
    session_start();
    
    require "../../data/conn.php";
    
    require "../../models/Category.php";
    
    require "../../models/Town.php";

    require "../../models/User.php";

    require "../../models/Comment.php";
    
    require "../../models/Article.php";
    
    $towns = Town::getTowns($conn);
    $categories = Category::getCategories($conn);
    $users = User::getUsers($conn);
    $comments = Comment::getComments($conn, $users);
    
    