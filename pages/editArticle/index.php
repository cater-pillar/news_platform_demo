<?php

require "../../data/requirements.php";

require "../../data/all_articles.php";

require "../../partials/page_title.php";

require "../../partials/nav.php";

if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}
?>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        <?php echo $page_title; ?>
    </div>
