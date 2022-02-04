<?php

require "../data/conn.php";
session_start();
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
    var_dump($previous);
}

if (isset($_POST['user']) && isset($_POST['password'])) {
    
    if($conn->login($_POST['user'], $_POST['password'])) {
        $newuser= $conn->getUser($_POST['user']);
        if(isset($_POST['keep'])) {
            setcookie("user", $newuser['id'], time() +60*60*24*5, '/');
        }
        $_SESSION['user'] = $newuser['id'];
        header("Location: $previous");
    } else {
        echo "Neispravno korisnicko ime ili lozinka.";
    }  
        
   
}