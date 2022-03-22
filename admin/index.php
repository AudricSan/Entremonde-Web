<?php

$title = "admin";
include_once("../public/include/header.php");
// include('../model/autoload.php');

if (empty($_SESSION)) {
    header('location: login.php');

} else {
    if (existadmin($_SESSION['admin'])) {
        // echo ('COUCOU admin : ' . $_SESSION['admin']);

    } else {
        unset($_SERVER['admin']);
        header('location: /');
    }
}
?>

<section>
<h1>Admin Connected</h1>


</section>


</div>
</body>

<?php include("../public/include/footer.php"); ?>
</html>