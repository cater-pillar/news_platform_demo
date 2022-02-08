<?php
require "conn.php";
require '../models/Article.php';

if(isset($_POST['category'], 
         $_POST['town'], 
         $_POST['title'], 
         $_FILES['photo'], 
         $_POST['abstract'], 
         $_POST['body'])) {

            $photo = $_FILES['photo'];
            if($photo['error']==0) {
                $file_path = "../images/". $photo['full_path'];
                $success = move_uploaded_file($photo['tmp_name'], $file_path);
                if ($success) {
                    $new_article = new Article(0, $_POST['category'], 
                                        $_POST['town'], 
                                        $_POST['title'], 
                                        date("Y-m-d H:i:s"), 
                                        $file_path, 
                                        $_POST['abstract'], 
                                        $_POST['body']);
                }
                $new_article->uploadArticle($conn);
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }
                header("Location: ../pages/newArticle");
            } 
            
         } 




