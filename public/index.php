<?php

include ('../model/autoload.php');
include ('../model/Class/Admin.php');
include ('../model/DAO/AdminDAO.php');
include ('../controller/AdminController.php');

include ('../model/Class/User.php');
include ('../model/DAO/UserDAO.php');
include ('../controller/UserController.php');

$admin = new AdminController();
$admin->show(1);

$user = new UserController();
$user->show(1);














?>