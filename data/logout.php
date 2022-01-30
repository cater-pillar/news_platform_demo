<?php
session_start();

unset($_COOKIE['user']);
setcookie('user','',time()-3600);

session_destroy();

header('Location: ../home');