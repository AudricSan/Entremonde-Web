<?php
$title = 'about us';
include_once("../public/include/header.php");
?>

<section id="texte-images">
    <article>
        <h2>Galerie</h2><br>
        <p>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
        </p>

    </article>
</section>

<section class="photos">
    <?php getphoto(); ?>
</section>

<script src="../public/js/media.js"></script>

<?php include_once("../public/include/footer.php"); ?>