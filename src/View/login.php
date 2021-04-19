<?php
require 'includes/header.php';
?>

<section class="login-form">
    <h2>Login to admin page :</h2>
    <form action="index.php?page=admin" method="post">
        <label for="userName">User name:</label>
        <input type="text" name="userName">
        <label for="userPass">Password:</label>
        <input type="password" name="userPass">
        <input type="submit" value="Log in">
    </form>
</section>

<?php
require 'includes/footer.php';
?>