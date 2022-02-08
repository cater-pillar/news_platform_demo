<?php
require "../../data/requirements.php";

$page_title = 'Login';

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
        Login 
        <?php if(isset($_GET['error']) && $_GET['error'] == 1) : ?>
            | <span class="login-error">Neispravno korisničko ime ili lozinka!</span>
        <?php endif ; ?>
    </div>
<form action="../../data/login.php" method="post" class="login-form">
        <input type="text" name="user" placeholder="Korisničko ime ili email" required>
        <input type="password" name="password" placeholder="Lozinka" required>
        <input type="checkbox" name="keep" id="keep">
        <label for="keep">Ostavi me prijavljenog</label>
        <input type="submit" value="Prijavi se">
</form>
<p class="login-page">Nemate nalog? <a href="../signup/">Otvorite ga</a></p>
<?php require "../../partials/footer.php" ?>
</div>
</body>