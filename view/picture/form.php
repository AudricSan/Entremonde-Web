<?php

$statut = new StatutController;
$status = $statut->index();

$tag = new TagController;
$tags = $tag->index();

// var_dump($_POST);
if (!empty($_POST)) {
    $user = new PictureController;
    $user->store($_POST);
    unset($_POST);
}
?>

<form class="form" action="" role="form" method="post" enctype="multipart/form-data">
    <label for="name">Name: </label>
    <input type="text" id="name" name="name" placeholder="Nom"><br>

    <label for="desc">Description: </label>
    <input type="text"  id="desc" name="desc" placeholder="desc"><br>

    <label for="statut">Statut: </label>
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
    
    <label for="tags">Tags: </label>
    <select name="tags" id="tags">
        <?php
        foreach ($tags as $key => $value) {
            // var_dump($value);
            $val = $value->_id;
            $tooltip = $value->_name;
            echo "<option value='$val'>$tooltip</option>";
        }
        ?>
    </select> <br>

    <label for="image">Sélectionner une image:</label>
    <input type="file" id="image" name="image"> <br>

    <input type="submit" value="Send">
</form>