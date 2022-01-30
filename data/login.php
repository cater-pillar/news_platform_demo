<?php

require "../data/requirements.php";



if (isset($_POST['user']) && isset($_POST['password'])) {
    
    if($conn->login($_POST['user'], $_POST['password'])) {
        $newuser= $conn->getUser($_POST['user']);
        $_SESSION['user'] = $newuser['id'];
        header("Location: ../home");
    } else {
        echo "Neispravno korisnicko ime ili lozinka.";
    }  
        
    
}