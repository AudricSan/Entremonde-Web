<?php 
if (!isset($_SESSION['Admin'])) {
    header('location: log.php');

} else {
    if ($_SESSION['Admin'] !== true) {
        unset($_SERVER['Admin']);    
        header('location: /');
    }
}

