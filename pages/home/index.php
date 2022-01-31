
<?php


require "../../data/requirements.php";

require "../../data/all_articles.php";

require "../../partials/page_title.php";

require "../../partials/nav.php";


?><div class="main-container">
    <div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        <?php echo $page_title; ?>
    </div>

    <div class="main-article">
        <?php 
            if(count($articles) !== 0) {
                $current_article = $articles[0];
                $article_class = "main-article";
                require "../../partials/current_article.php";
            }
            
        ?>
    </div>
    <div class="horizontal-banner-red"></div>
    <ul class="articles-list">
        <?php foreach($articles as $index => $article) : ?>
        <?php if($index !== 0) :?>
        <li class="articles-list-item">
        <?php 
            $current_article = $article;
            $article_class = "articles-list";
            require "../../partials/current_article.php";
        ?>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <?php require "../../partials/footer.php" ?>
</div>
</body>