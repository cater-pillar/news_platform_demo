<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesti | <?= $page_title; ?></title>
    <link rel="icon" href="../../images/newspaper-red.png">
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/single-article.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/responsive.css">
</head>
<body>
</html>
<header>
    <div class="head">
        <div class="search">
        <div class="main-container">
            <form action="../../pages/home/index.php" method="get">
                <input type="text" name="search" placeholder="Traži">
            </form>
        </div>
        </div>
        <div class="main-container">
            <img src="../../images/newspaper.png" alt="logo" class="logo">
            
        </div>
    </div>
    <nav>
        <?php if(isset($_SESSION['admin'])) : ?>
        <div class="nav-admin">
            <div class="main-container">
                Dobrodošao admine
            </div>
        </div>
        <?php endif; ?>
        <div class="nav-primary">
            <div class="main-container">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href='../../pages/home/index.php' class='nav-link'>NASLOVNA</a>
                    </li>
                    <?php foreach ($towns as $town): ?>
                        <li class="nav-item">
                            <a href='../../pages/home/index.php?town=<?= $town->getId()?>'
                            class='nav-link'>
                            <?= $town->getName()?>
                        </a></li>
                    <?php endforeach ; ?>
                </ul>
            </div>
        </div>
        <div class="nav-secondary">
            <div class="main-container">
            <ul class="nav-list">
                <?php foreach ($categories as $category): ?>
                    <li class="nav-item">
                        <a href='../../pages/home/index.php?category=<?= $category->getId()?>'
                           class='nav-link'>
                        <?= $category->getName()?>
                    </a></li>
                <?php endforeach ; ?>
            </ul>
            </div>
        </div>
    </nav>
</header>
