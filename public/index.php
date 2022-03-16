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


// $admin = new AdminController();
// // $admin->show(1);
// $admin->index();

// $user = new UserController();
// // $user->show(1);
// $user->index();

// $activity = new ActivityController();
// // $activity->show(1);
// $activity->index();

// $picture = new PictureController();
// // $picture->show(1);
// $picture->index();

// // $admin->create();
// // $user->create();
// // $activity->create();
// // $picture->create();
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

    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" media="screen and (max-width:1200px)" type="text/css" href="css/medium.css" media="screen">
    <link rel="stylesheet" media="screen and (max-width:768px)" type="text/css" href="css/min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />

    <!--icones importées-->
    <script src="https://kit.fontawesome.com/3d76d9e733.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
</head>



<body>
    <div class="open"></div>
    <div class="container">
        <?php 
            include ("include/header.php");
        ?>
        <!-- Intro -->
        <section id="accroche">
            <p>stages, anniv</p>
            <h1>Osez la grande aventure</h1>
            <div class="button" href="#"><span>C'est par ici</span></div>
        </section>
        
        <br><br>

        <!--Section stages-->
        <section id="sectionstage">
            <article>
                <section id="sectionstage2">
                    <div class="stages">
                        <h3>Trouver un Stage</h3>
                        <p>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>
                            tester tester tester >
                        </p>
                        <a class="button">click here</a>
                    </div>

                    <div id="player" class="video"></div>
                </section>
            </article>
        </section>

        <!--Section next-->
        <section id="sectionstage">
            <article>
                <section id="sectionstage2">
                    <div class="stages">
                        <h3>Trouver un Stage</h3>
                        <p>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>
                            tester tester tester >
                        </p>
                        <a class="button">click here</a>
                    </div>
                    <div id="player" class="video"></div>
                </section>
            </article>
        </section>

        <section id="sectionstage">
            <article>
                <section id="sectionstage2">
                    <div class="stages">
                        <h3>Trouver un Stage</h3>
                        <p>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <p>
                            tester tester tester >
                        </p>
                        <a class="button">click here</a>
                    </div>
                    <div id="player" class="video"></div>
                </section>
            </article>
        </section>
</body>

<?php
    include ("include/footer.php");
?>

<script src="index.js"></script>

</html>