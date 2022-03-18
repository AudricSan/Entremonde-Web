<?php
    include_once('../model/autoload.php');

    // var_dump($_SERVER);
    $root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    $_SESSION['root'] = $root;

    // var_dump($root);
    //CSS link//
    $anim_css = $root   . 'public/css/anim.css';
    $style_css = $root   . 'public/css/index.css';
    $globals_css = $root   . 'public/css/globals.css';



    $debug_css = $root   . 'public/css/debug.css';

    //OtherVar//
    $autor = 'Audric Rosier, Xavier Deleclos';
    $description = 'Site internet de Entremonde ASBL';
    $keyword = 'SEO, keyword';

    //TITLE//
    if(!isset($title)){
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
        <link rel='stylesheet' type='text/css' href='$debug_css' media='screen' />

        <!--icones importées-->
        <script src='https://kit.fontawesome.com/3d76d9e733.js' crossorigin='anonymous'></script>
        <!--<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>-->
    </head>
    ";

    echo "
        <body>
        <div class='open'></div>
        <div class='container'>
            <header id='header'>
                <nav>
                    <figure id='logo'><a href='/'><img src='images/logo.jpg' alt='Logo' title='Company name' width='200'></a></figure>
                    <ul class='navigation'>
                        <li><a href='#'>Onglet 1</a></li>
                        <li><a href='#contenu'>Onglet 2</a></li>
                        <li><a href='#produits'>Onglet 3</a></li>
                        <li><a href='#galerie'>Onglet 4</a></li>
                        <li><a href='#texte-images'>Onglet 5</a></li>
                        <li><a href='#reseaux'> CONTACT</a></li>
                    </ul>

                    <ul class='navigation'>
                        <li><a href='/view/login'> Connection </a></li>
                        <li><a href='/view/insciption'> Inscription </a></li>
                    </ul>
                </nav>
            </header>
    ";
?>