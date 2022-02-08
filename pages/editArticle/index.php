<?php

require "../../data/requirements.php";
require "../../data/one_article.php";

$page_title = "Admin | Izmena Vesti";
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
        Izmena vesti
    </div>
<form action="../../data/insert_article.php" 
      method="post" enctype="multipart/form-data" 
      class="login-form">
    <select name='category' required>
        <option value="<?= $one_article->getCategory_id() ?>">
            <?= $one_article->getCategory() ?>
        </option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category->getId(); ?>">
                <?= $category->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select name='town' required>
        <option value="<?= $one_article->getTown_id() ?>">
            <?= $one_article->getTown() ?>
        </option>
        <?php foreach ($towns as $town): ?>
            <option value="<?= $town->getId(); ?>">
                <?= $town->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="title" required value="<?= $one_article->getTitle() ?>"
           placeholder="Unesite naslov vesti">
    <label for="photo" class="custom-photo-upload" >
        Postavi fotografiju
    </label>
    <input type="file" id="photo" name="photo" accept="image/*" required value="<?= $one_article->getPhoto() ?>">
    <textarea name="abstract" placeholder="Unesite apstrakt vesti" required rows="7"><?=$one_article->getAbstract()?>
    </textarea>
    <textarea name="body" placeholder="Unesi telo vesti" required rows="32"><?=$one_article->getBody()?></textarea>
    <input type="submit" value="Prosledi novu vest">
</form>
<?php require "../../partials/footer.php" ?>
</div>
</body>