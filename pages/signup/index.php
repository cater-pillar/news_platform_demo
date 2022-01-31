<?php
require "../data/requirements.php";
$page_title = 'Signup';
require "../partials/nav.php";

if(isset($_SESSION['user'])) {
    header('Location: ../home');
}

?>
<div class="main-container">
<div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Signup 
    </div>
<form action="../data/signup.php" method="post" class="login-form">
        <input type="text" name="username" placeholder="Korisničko ime">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Lozinka">
        <input type="submit" value="Otvori nalog">
</form>
<p class="login-page">Već imate nalog? <a href="../login/">Prijavite se</a></p>
<?php require "../partials/footer.php" ?>
</div>
</body>