<?php
require "conn.php";
require '../models/Article.php';

echo "<pre>";
var_dump($_FILES);
echo "</pre>";
echo "<pre>";
var_dump($_POST);
echo "</pre>";


$new_article = new Article(0, $_POST['category'], 
                              $_POST['town'], 
                              $_POST['title'], 
                              date("Y-m-d"), 
                              $_FILES['photo']['full_path'], 
                              $_POST['abstract'], 
                              $_POST['body']);


var_dump($new_article->getTitle());

$new_article->uploadArticle($conn);