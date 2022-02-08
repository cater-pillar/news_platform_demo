<?php

require "../../data/requirements.php";
require "../../data/one_article.php";

if(isset($one_article)) {
    $page_title = $one_article->getCategory()." | " . $one_article->getTitle();
} else {
    $page_title = "Error 404: strana nije nadjena";
}

require "../../partials/nav.php";
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

?>
<div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        <?= "Vesti | ". $page_title ?>
    </div>
    <?php if(isset($one_article)) : ?>
    <div class="single-article">
        <img class="single-article-image" 
             src="../<?= $one_article->getPhoto() ?>" >
        <div class="single-article-group">
            <div class="single-article-info">
                <?= $one_article->getPublished_at() ?> | 
                <?= $one_article->getCategory() ?> |
                <?= $one_article->getTown() ?>
            </div>
            <h1 class="single-article-title">
                <?= $one_article->getTitle() ?>
            </h1>
            <p class="single-article-abstract">
                <strong>
                    <?= $one_article->getAbstract() ?>
                </strong>
            </p>
        </div>
        <div class="single-article-body">
        <?= $one_article->getBody() ?>
        </div>
        
        
    </div>
    <div class="horizontal-banner-red"></div>
    <h2 class="h-comments">KOMENTARI</h2>
        <?php if(!isset($_SESSION['admin'])) : ?>
        <a class="span-comments" href="#comment">
            <img src="../../images/draw.png" alt="user"/>    
            Pošalji komentar
        </a>
        <?php endif; ?>
        <span class="span-comments">
            <img src="../../images/speech-bubble-gray.png" alt="edit"/>
            Komentari (<?= count($one_article->getComments()) ?>)
        </span>
        
    <ul class="list-comments">
        <?php foreach($one_article->getComments() as $comment): ?>
            <li class="comment-user">
                <?php if(isset($_SESSION['admin']) || 
                        (isset($_SESSION['user']) && 
                        $comment->getUser_id() == $_SESSION['user'])): ?>
                    <a href="../../pages/editComment/?id=<?= $comment->getId(); ?>"
                       class="delete-edit-link" title="edit">
                        <img src="../../images/edit.png" alt="edit" class="delete-edit-img">
                    </a>
                    <a href="../../data/delete_comment.php?id=<?= $comment->getId(); ?>"
                    class="delete-edit-link" title="delete">
                        <img src="../../images/delete.png" alt="delete" class="delete-edit-img">
                    </a>
                <?php endif; ?>
                <img src="../../images/user.png" alt="user" class="user-img"/>
                <div>
                    <h3>
                        <?= $comment->getUser(); ?>
                    </h3>
                    <span>
                        <?= $comment->getPublished_at(); ?>
                    </span>
                    <p>
                        <?= $comment->getBody(); ?>
                    </p>
                </div>
            </li>    
        <?php endforeach; ?>
    </ul>
    <?php if(!isset($_SESSION['admin'])) : ?>
    <?php if(isset($_SESSION['user'])) : ?>
    <h5 id="comment">
        Pošalji komentar:
    </h5>
    <form action="../../data/new_comment.php" 
          method="post" 
          class="login-form">
        <input row="5" type="text" required
               name="comment" placeholder="Komentar">
        <input class="hidden-input" name="article_id" 
               value="<?= $_GET['id']?>" type="text" >
        <input class="hidden-input" name="user_id" 
               value="<?= $_SESSION['user']?>" type="text" >
        <input type="submit" value="Pošalji">
    </form>
    <form action="../../data/logout.php" class="logout-form">
        <input type="submit" value="Odjavi me" class="logout-submit"/>
    </form>
    <?php else : ?>
    <h5>
    Otvorite nalog da biste postavili komentar:
    </h5>
    <form action="../../data/signup.php?id=<?= $_GET['id']; ?>" 
          method="post" class="login-form">
        <input type="text" name="username" required
               placeholder="Korisničko ime">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" required
               placeholder="Lozinka">
        <input type="checkbox" name="keep" id="keep">
        <label for="keep">Ostavi me prijavljenog</label>
        <input type="submit" value="Otvori nalog">
    </form>
    <p>Već imate nalog? <a href="../login/">Prijavite se</a></p>
    <?php endif ; ?>
    <?php endif; ?>
    <?php endif ; ?>
    <?php require "../../partials/footer.php" ?>
</div>
</body>