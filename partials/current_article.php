<div class="<?= $article_class; ?>-img">
    <img src="../<?= $current_article->getPhoto()?>">
</div>
<div class="<?= $article_class; ?>-body">
    <p>
        <?= isset($_GET['category']) ? 
            $current_article->getTown() : 
            $current_article->getCategory();
        ?>
        <?php if(isset($_SESSION['admin'])): ?>
        <a href="../../pages/editArticle/?id=<?= $current_article->getId(); ?>"
           class="delete-edit-link" title="edit">
           <img src="../../images/edit.png" alt="edit" class="delete-edit-img">
        </a>
        <a href="../../data/delete_article.php?id=<?= $current_article->getId(); ?>"
           class="delete-edit-link" title="delete">
           <img src="../../images/delete.png" alt="delete" class="delete-edit-img">
        </a>
        <?php endif; ?>
    </p>
    <h1>
        <a class="title-color" 
           href="../../pages/article/index.php?id=<?= $current_article->getId(); ?>">
            <?= $current_article->getTitle()?>
        </a>
    </h1>
    <p class="<?= $article_class; ?>-abstract">
        <?= $current_article->getAbstract()?>
    </p>
    <?php 
        $breadcrumb = $current_article;
        require "../../partials/breadcrumbs.php";
    ?>
</div>
