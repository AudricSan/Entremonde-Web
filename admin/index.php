<?php
session_start();
// var_dump($_SESSION);

include('../model/autoload.php');

if (empty($_SESSION)) {
    header('location: login.php');

} else {
    if (existadmin($_SESSION['admin'])) {
        echo ('COUCOU admin : ' . $_SESSION['admin']);

    } else {
        unset($_SERVER['admin']);
        header('location: /');
    }
}