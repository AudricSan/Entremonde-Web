<?php

include '../model/autoload.php';
include '../model/Class/Admin.php';
include '../model/DAO/AdminDAO.php';
include '../controller/AdminController.php';

$adminController = new AdminController();
$adminController->show(1);