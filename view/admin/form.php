<?php
$role = new RoleController;
$roles = $role->index();

if (isset($_POST)) {
    $admin = new AdminController;
    $admin->store($_POST);
}

?>

<form action="" method="POST">
    <label for="name">Enter your Name: </label>
    <input type="text" name="name" id="name"> <br>

    <label for="fname">Enter your Firstname: </label>
    <input type="text" name="fname" id="fname"> <br>

    <label for="mail">Enter your Mail: </label>
    <input type="email" name="mail" id="mail"> <br>

    <label for="role">Admin Role </label>
    <select name="role" id="role">
        <?php
        foreach ($roles as $key => $value) {
            // var_dump($value);
            $val = $value->_id;
            $tooltip = $value->_name;
            echo "<option value='$val'>$tooltip</option>";
        }
        ?>
    </select> <br>

    <label for="pass">Enter your Password: </label>
    <input type="password" name="pass" id="pass"> <br>

    <label for="pass2">Confirm your Password: </label>
    <input type="password" name="pass2" id="pass2"> <br>

    <input type="submit" value="Send">
</form>