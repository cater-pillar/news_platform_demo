<div class="breadcrumbs">
    <a href="../article/index.php?id=<?= $breadcrumb->getId(); ?>" class="article-link">detaljnije ></a>
    <a href="../article/index.php?id=<?= $breadcrumb->getId(); ?>" class="comments-link">
        <img class="speech-bubble" src="../images/speech-bubble.png">(<?= count($breadcrumb->getComments()) ?>)
    </a>
</div>