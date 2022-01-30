<?php
if(isset($_GET['search'])) {
        $articles = Article::getArticles(
            $conn->prepareSearch(), 
            $categories, 
            $towns, 
            $comments
        );
    } elseif (isset($_GET['category'])) {
        $articles = Article::getArticles(
            $conn->prepareByCategory(), 
            $categories, 
            $towns, 
            $comments
        );
    } elseif(isset($_GET['town'])) {
        $articles = Article::getArticles(
            $conn->prepareByTown(), 
            $categories, 
            $towns, 
            $comments
        );
    } else {
        $articles = Article::getArticles(
            $conn->prepareAll(), 
            $categories, 
            $towns, 
            $comments
        );
    }