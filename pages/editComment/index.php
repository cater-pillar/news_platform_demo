<?php

require "../../data/requirements.php";


$page_title = "User | Izmena Komentara";
require "../../partials/nav.php";
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if(!isset($_SESSION['user'])) {
    die("Niste prijavljeni.");
}

$comment = $conn->getComment($_GET['id']);
?>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Izmena komentara
    </div>
    <h5 id="comment">
        Izmeni komentar:
    </h5>
    <form action="../../data/edit_comment.php?id=<?= $_GET['id']. "&article=". $comment['article_id'];?>" 
          method="post" 
          class="login-form">
        <input row="5" type="text" required value="<?= $comment['body']?>"
               name="comment" placeholder="Komentar">
        <input type="submit" value="Izmeni">
    </form>