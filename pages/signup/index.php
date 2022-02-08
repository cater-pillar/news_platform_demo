<?php
require "../../data/requirements.php";
$page_title = 'Signup';
require "../../partials/nav.php";

if (isset($_COOKIE['admin'])) {
    $_SESSION['admin'] = $_COOKIE['admin'];
}
if(isset($_SESSION['admin'])) {
    header('Location: ../../pages/home');
}
if (isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}
if(isset($_SESSION['user'])) {
    header('Location: ../../pages/home');
}

?>
<div class="main-container">
<div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Signup 
        <?php if(isset($_GET['error']) && $_GET['error'] == 1) : ?>
            | <span class="login-error">Greška: Korisnik već postoji!</span>
        <?php endif ; ?>
    </div>
<form action="../../data/signup.php" method="post" class="login-form">
        <input type="text" name="username" placeholder="Korisničko ime">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Lozinka">
        <input type="checkbox" name="keep" id="keep">
        <label for="keep">Ostavi me prijavljenog</label>
        <input type="submit" value="Otvori nalog">
</form>
<p class="login-page">Već imate nalog? <a href="../../pages/login/">Prijavite se</a></p>
<?php require "../../partials/footer.php" ?>
</div>
</body>