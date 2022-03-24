<?php
$title = "admin";
include_once("../public/include/header.php");
// include('../model/autoload.php');

if (!isset($_SESSION['admin'])) {
    header('location: login.php');
} else {
    if (!existadmin($_SESSION['admin'])) {
        unset($_SERVER['admin']);
        header('location: /');
    }
}
?>

<section>
    <h1>Admin <?php echo $_SESSION['admin'] ?> Connected</h1>
    
    
</section>
<?php include("../public/include/footer.php"); ?>

</html>