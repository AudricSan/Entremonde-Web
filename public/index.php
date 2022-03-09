<?php

include ('../model/autoload.php');

include ('../model/Class/Admin.php');
include ('../model/DAO/AdminDAO.php');
include ('../controller/AdminController.php');

include ('../model/Class/User.php');
include ('../model/DAO/UserDAO.php');
include ('../controller/UserController.php');

include ('../model/Class/Activity.php');
include ('../model/DAO/ActivityDAO.php');
include ('../controller/ActivityController.php');

include ('../model/Class/Picture.php');
include ('../model/DAO/PictureDAO.php');
include ('../controller/PictureController.php');

include ('../model/Class/Role.php');
require ('../model/DAO/RoleDAO.php');
require ('../controller/RoleController.php');

include ('../model/Class/Statut.php');
require ('../model/DAO/StatutDAO.php');
require ('../controller/StatutController.php');

include ('../model/Class/Type.php');
require ('../model/DAO/TypeDAO.php');
require ('../controller/TypeController.php');


$admin = new AdminController();
    // $admin->show(1);
    $admin->index();

$user = new UserController();
    // $user->show(1);
    $user->index();
 
$activity = new ActivityController();
    // $activity->show(1);
    $activity->index();

$picture = new PictureController();
    // $picture->show(1);
    $picture->index();

    // $admin->create();
    // $user->create();
    // $activity->create();
    $picture->create();

?>