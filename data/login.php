<?php

require "../data/conn.php";
session_start();


if (isset($_POST['user']) && isset($_POST['password'])) {
    
    if($conn->login($_POST['user'], $_POST['password'])) {
        $newuser= $conn->getUser($_POST['user']);
        if ($newuser['is_admin'] == 1) {
            if(isset($_POST['keep'])) {
                setcookie("admin", $newuser['id'], time() +60*60*24*5, '/');
            }
            $_SESSION['admin'] = $newuser['id'];
            header("Location: ../pages/home");
        } else {
            if(isset($_POST['keep'])) {
                setcookie("user", $newuser['id'], time() +60*60*24*5, '/');
            }
            $_SESSION['user'] = $newuser['id'];
            if(isset($_SERVER['HTTP_REFERER'])) {
                $previous = $_SERVER['HTTP_REFERER'];
            }
            header("Location: $previous");
        }
        
    } else {
        echo "Neispravno korisnicko ime ili lozinka.";
    }  
        
   
}