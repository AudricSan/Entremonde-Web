<?php
$form = new FormController;
?>

<form action="../../controller/FormController.php" method="POST">
    <label for="name">Enter your Name: </label>
    <input type="text" name="name" id="name"> <br>
    
    <label for="fname">Enter your Firstname: </label>
    <input type="text" name="fname" id="fname"> <br>
    
    <label for="mail">Enter your Mail: </label>
    <input type="email" name="mail" id="mail"> <br>
    
    <label for="pass">Enter your Password: </label>
    <input type="password" name="pass" id="pass"> <br>
    
    <label for="pass2">Confirm your Password: </label>
    <input type="password" name="pass2" id="pass2"> <br>

    <input type="submit" value="Send">
</form>