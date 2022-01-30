<?php
require "../data/requirements.php";

$page_title = 'Login';

require "../partials/nav.php";

if(isset($_SESSION['user'])) {
    header('Location: ../home');
}

?>
<div class="main-container">
<div class="horizontal-banner"></div>
    <div class="breadcrumbs">
        Login 
    </div>
<form action="../data/login.php" method="post" class="login-form">
        <input type="text" name="user" placeholder="Korisničko ime ili email">
        <input type="password" name="password" placeholder="Lozinka">
        <input type="submit" value="Prijavi se">
</form>
<p class="login-page">Nemate nalog? <a href="../signup/">Otvorite ga</a></p>
<?php require "../partials/footer.php" ?>
</div>
</body>