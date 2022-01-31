<?php

require "../data/conn.php";
session_start();


if (isset($_POST['user']) && isset($_POST['password'])) {
    
    if($conn->login($_POST['user'], $_POST['password'])) {
        $newuser= $conn->getUser($_POST['user']);
        $_SESSION['user'] = $newuser['id'];
        header("Location: ../pages/home");
    } else {
        echo "Neispravno korisnicko ime ili lozinka.";
    }  
        
   
}