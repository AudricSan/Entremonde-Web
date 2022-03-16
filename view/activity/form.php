<?php

$statut = new StatutController;
$status = $statut->index();

$type = new TypeController;
$types = $type->index();

if (isset($_POST)) {
    $user = new ActivityController;
    $user->store($_POST);
}
?>

<form action="" method="POST">
    <label for="name">Activity Name: </label>
    <input type="text" name="name" id="name"> <br>
    
    <label for="desc">Activity Descrition: </label>
    <input type="text" name="desc" id="desc"> <br>

    <label for="content">Activity Content: </label>
    <textarea name="content"
        rows="5" cols="30"
        minlength="80" maxlength="800"
        placeholder="Description complette de lactiviter, information Public."></textarea> <br>
    
    <label for="statut">Activity Default Statut: </label>
    <select name="statut" id="statut">
        <?php
        foreach ($status as $key => $value) {
            // var_dump($value);
            $val = $value->_id;
            $tooltip = $value->_name;
            echo "<option value='$val'>$tooltip</option>";
        }
        ?>
    </select> <br>

    <label for="type">Activity Type: </label>
    <select name="type" id="type">
        <?php
        foreach ($types as $key => $value) {
            // var_dump($value);
            $val = $value->_id;
            $tooltip = $value->_name;
            echo "<option value='$val'>$tooltip</option>";
        }
        ?>
    </select> <br>   
     
    <label for="price">Activity Price: </label>
    <input type="number" name="price" id="price"> <br>

    <label for="date">Activity Date: </label>
    <input type="date" name="date" id="date"> <br>

    <input type="submit" value="Send">
</form>