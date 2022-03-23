<?php
session_start();
require_once('../model/autoload.php');


// var_dump($_SERVER);
$root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
$_SESSION['root'] = $root;

// var_dump($root);
//CSS link//
$anim_css = $root   . 'public/css/anim.css';
$style_css = $root   . 'public/css/index.css';
$globals_css = $root   . 'public/css/globals.css';


//OtherVar//
$autor = 'Audric Rosier, Xavier Deleclos';
$description = 'Site internet de Entremonde ASBL';
$keyword = 'SEO, keyword';
$imglink = $_SESSION['root'] . 'public/img';

$imglink = urldecode($imglink);

if(!isset($_COOKIE['rootimg'])) {
    setcookie("rootimg", $imglink);
}

//TITLE//
if (!isset($title)) {
    $title = 'Entremonde ASBL';
}

echo "
    <!DOCTYPE HTML>
    <html lang='fr'>

    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>

        <title>$title</title>

        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <meta name='keywords' content='$keyword'>
        <meta name='description' content='$description'>
        <meta name='auteur' content='$autor'>

        <!-- <link rel='stylesheet' type='text/css' href='css/reset.css' /> -->
        <link rel='stylesheet' type='text/css' href='$globals_css' media='screen' />
        <link rel='stylesheet' type='text/css' href='$style_css' media='screen' />
        <link rel='stylesheet' type='text/css' href='$anim_css' media='screen' />

        <!--icones importées-->
        <script src='https://kit.fontawesome.com/3d76d9e733.js' crossorigin='anonymous'></script>
        <!--<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>-->
    </head>
";

if ($title != 'admin') {
    echo "
        <body>
        <div class='open'></div>
        <header id='header'>
            <nav>
                <figure id='logo'><a href='/'><img src='$imglink/logo.png' alt='Logo' title='Entremonde ASBL Logo''></a></figure>
                <ul class='navigation'>
                    <li><a href='/view/about'>About Us</a></li>
                    <li><a href='/view/activities'>Activities</a></li>
                    <li><a href='/view/contact'>Contact</a></li>
                    <li><a href='/view/gallery'>Gallery</a></li>
                </ul>

                <ul class='navigation'>
                    <li><a href='/user/login'> Connection </a></li>
                    <li><a href='/view/insciption'> Inscription </a></li>
                </ul>
            </nav>
        </header>
        <div class='container'>
    ";
} else {
    echo "
        <body>
        <div class='open'></div>
        <header id='header'>
            <nav>
                <figure id='logo'><a href='/'><img src='img/logo.png' alt='Logo' title='Entremonde ASBL Logo''></a></figure>
                <ul class='navigation'>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                    <li><a href='#'> Admin NAV </a></li>
                </ul>

                <ul class='navigation'>
                    <li><a href='/admin/disc'> Disconnect </a></li>
                    <li><a href='/admin/add'> Add new Admin </a></li>
                </ul>
            </nav>
        </header>
        <div class='container'>
    ";
}
