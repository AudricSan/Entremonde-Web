<?php
include('../model/autoload.php');

include('../model/Class/Admin.php');
include('../model/DAO/AdminDAO.php');
include('../controller/AdminController.php');

include('../model/Class/User.php');
include('../model/DAO/UserDAO.php');
include('../controller/UserController.php');

include('../model/Class/Activity.php');
include('../model/DAO/ActivityDAO.php');
include('../controller/ActivityController.php');

include('../model/Class/Picture.php');
include('../model/DAO/PictureDAO.php');
include('../controller/PictureController.php');

include('../model/Class/Role.php');
require('../model/DAO/RoleDAO.php');
require('../controller/RoleController.php');

include('../model/Class/Statut.php');
require('../model/DAO/StatutDAO.php');
require('../controller/StatutController.php');

include('../model/Class/Type.php');
require('../model/DAO/TypeDAO.php');
require('../controller/TypeController.php');

include('../model/Class/Tag.php');
require('../model/DAO/TagDAO.php');
require('../controller/TagController.php');

?>

<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Entremonde</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="référencement,SEO,balise meta keywords">
    <meta name="description" content="Free Web tutorials">
    <meta name="auteur" content="Xavier Deleclos">

    <!-- <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" /> -->

    <!--icones importées-->
    <script src="https://kit.fontawesome.com/3d76d9e733.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
</head>

<body>
    <div class="open"></div>
    <div class="container">

    <?php include("include/header.php"); ?>
      
        <!-- Intro -->
        <section id="accroche">
            <p>stages, anniv</p>
            <h1>Osez la grande aventure</h1>
            <div class="button" href="#"><span>C'est par ici</span></div>
        </section>

        <!--Section stages-->
        <section id="sectionstage">
            <?php gethome(); ?>
        </section>
</body>

<?php include("include/footer.php"); ?>

<script src="video.js"></script>
</html>