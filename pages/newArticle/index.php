<?php

require "../../data/requirements.php";
$page_title = "Admin | Nova Vest";
require "../../partials/nav.php";
if (isset($_COOKIE['admin'])) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}
if(!isset($_SESSION['admin'])) {
    die("Nemate admin privilegije.");
}
?>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Dodaj novu vest
    </div>
<form action="../../data/insert_article.php" 
      method="post" enctype="multipart/form-data" 
      class="login-form">
    <select name='category' required>
        <option value="">Odaberi kategoriju</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category->getId(); ?>">
                <?= $category->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select name='town' required>
        <option value="">Odaberi grad</option>
        <?php foreach ($towns as $town): ?>
            <option value="<?= $town->getId(); ?>">
                <?= $town->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="title" required
           placeholder="Unesite naslov vesti">
    <label for="photo" class="custom-photo-upload">
        Postavi fotografiju
    </label>
    <input type="file" id="photo" name="photo" accept="image/*" required>
    <textarea name="abstract" placeholder="Unesite apstrakt vesti" required>
    </textarea>
    <textarea name="body" placeholder="Unesi telo vesti" required>
    </textarea>
    <input type="submit" value="Prosledi novu vest">
</form>
<?php require "../../partials/footer.php" ?>
</div>
</body>