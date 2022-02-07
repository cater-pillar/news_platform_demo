<?php
session_start();

unset($_COOKIE['user']);
setcookie('user','',time()-3600, '/');


unset($_COOKIE['admin']);
setcookie('admin','',time()-3600, '/');

session_destroy();

if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}


header("Location: $previous");