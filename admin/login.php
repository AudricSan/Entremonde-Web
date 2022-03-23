<?php
    $title = 'Admin Login';
    include_once("../public/include/header.php");
    
    if (!empty($_POST)) {
        $user = new AdminController;
        $user->login($_POST);
        unset($_POST);
    }
?>

<section>
<h1>LOGIN PAGE</h1>
<form action="" method="POST">
    <label for="login">Enter your Login: </label>
    <input type="text" name="login" id="login"> <br>
    
    <label for="pass">Enter your Password: </label>
    <input type="password" name="pass" id="pass"> <br>

    <input type="checkbox" name="hum" id="hum" checked style="display: none;">
    <input type="submit" value="Send">
</form>
</section>