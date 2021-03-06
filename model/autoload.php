<?php

include_once('../model/Class/Admin.php');
include_once('../model/DAO/AdminDAO.php');
include_once('../controller/AdminController.php');

include_once('../model/Class/User.php');
include_once('../model/DAO/UserDAO.php');
include_once('../controller/UserController.php');

include_once('../model/Class/Activity.php');
include_once('../model/DAO/ActivityDAO.php');
include_once('../controller/ActivityController.php');

include_once('../model/Class/Picture.php');
include_once('../model/DAO/PictureDAO.php');
include_once('../controller/PictureController.php');

include_once('../model/Class/Role.php');
include_once('../model/DAO/RoleDAO.php');
include_once('../controller/RoleController.php');

include_once('../model/Class/Statut.php');
include_once('../model/DAO/StatutDAO.php');
include_once('../controller/StatutController.php');

include_once('../model/Class/Type.php');
include_once('../model/DAO/TypeDAO.php');
include_once('../controller/TypeController.php');

include_once('../model/Class/Tag.php');
include_once('../model/DAO/TagDAO.php');
include_once('../controller/TagController.php');

if (file_exists('../env.php')) {
    if (!function_exists('env')) {
        function env($key, $default = null)
        {
            require '../env.php';

            if (array_key_exists($key, $env)) {
                $value = $env[$key];
            } else {
                return $default;
            }
            return $value;
        }
    }
}

function checkinput($data)
{
    if (isset($data['human'])) {
        return false;
    }

    // var_dump($data);
    // $var = [IF] ? [THEN] : [ELSE];

    //Globals
    $login     = isset($data['log'])           ? $data['log']           : false;
    $name      = isset($data['name'])          ? $data['name']          : false;
    $firstname = isset($data['fname'])         ? $data['fname']         : false;
    $mail      = isset($data['mail'])          ? $data['mail']          : false;
    $pass      = isset($data['pass'])          ? $data['pass']          : false;
    $pass2     = isset($data['pass2'])         ? $data['pass2']         : false;
    $role      = isset($data['role'])          ? $data['role']          : false;

    //User
    $bank      = isset($data['User_Bank'])     ? $data['User_Bank']     : false;
    $activity  = isset($data['User_Activity']) ? $data['User_Activity'] : false;
    $age       = isset($data['User_Age'])      ? $data['User_Age']      : false;
    $bday      = isset($data['User_Birthday']) ? $data['User_Birthday'] : false;
    $point     = isset($data['User_Point'])    ? $data['User_Point']    : false;

    //Activity
    $desc      = isset($data['desc'])          ? $data['desc']          : false;
    $type      = isset($data['type'])          ? $data['type']          : false;
    $statut    = isset($data['statut'])        ? $data['statut']        : false;
    $content   = isset($data['content'])       ? $data['content']       : false;
    $date      = isset($data['date'])          ? $data['date']          : false;
    $price     = isset($data['price'])         ? $data['price']         : false;

    //Picture
    $tag       = isset($data['tags'])          ? $data['tags']          : false;
    $image     = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : false;
    $imagePath          = '../public/img/store/' . basename($image);
    $imageExtension     = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess          = true;
    $isUploadSuccess    = false;

    //Exist ?
    $user = new UserDAO;
    $admin = new AdminDAO;

    $user = $user->fetchAll();
    $admin = $admin->fetchAll();

    $exist = array(
        'admin' => false,
        'user'  => false
    );

    foreach ($admin as $key => $value) {
        $mail === $value->_email ? $exist['admin'] =  true : $exist['admin'] =  false;
    }

    foreach ($user as $key => $value) {
        $mail === $value->_email ? $exist['user'] =  true : $exist['user'] =  false;
    }

    // var_dump($exist);

    if ($exist['admin'] === true || $exist['user'] === true) {
        echo ('USER OR ADMIN EXIST');
        return false;
    }

    //Regex
    $nregex = "/^[a-zA-Z0-9-]{2,15}$/";
    $mregex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
    $pregex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{10,}$/";

    $error = array();

    //Unset Post
    unset($data);
    unset($_POST);

    //Trim data
    $desc       = rtrim($desc);
    $content    = rtrim($content);

    $name       = rtrim($name);
    $firstname  = rtrim($firstname);
    $mail       = rtrim($mail);

    //format data
    $name       = strtolower($name);
    $firstname  = strtolower($firstname);
    $mail       = strtolower($mail);

    //confert Data
    $name = ucfirst($name);
    $firstname = ucfirst($firstname);

    //Generate Login
    $lfname = substr($firstname, 0, 3);
    $lname = substr($name, 0, 3);
    $login = $lname . $lfname . random_int(0, 999);
    // $login = substr($login, 0, 9);

    //Check data format
    if (preg_match($nregex, $name)) {
        $error['name'] = true;
    } else {
        $error['name'] = false;
        $name = false;
    }

    if (preg_match($mregex, $mail)) {
        $error['mail'] = true;
    } else {
        $error['mail'] = false;
        $mail = false;
    }

    if ($pass === $pass2) {
        unset($pass2);

        if (preg_match($pregex, $pass)) {
            $pass = password_hash($pass, PASSWORD_BCRYPT);
            $error['pass'] = true;
        } else {
            $error['pass'] = false;
            $pass = false;
        }
    } else {
        $error['pass'] = false;
        $pass = false;
    }

    if (strlen($content) > 0) {
        $error['content'] = true;
    } else {
        $error['content'] = false;
        $content = false;
    }

    if (strlen($desc) > 0) {
        $error['desc'] = true;
    } else {
        $error['desc'] = false;
        $desc = false;
    }

    if ($price > 0) {
        $error['price'] = true;
    } else {
        $error['price'] = false;
        $prise = false;
    }

    if ($tag > 0) {
        $error['tags'] = true;
    } else {
        $error['tags'] = false;
        $tag = false;
    }

    if ($statut > 0) {
        $error['statut'] = true;
    } else {
        $error['statut'] = false;
        $statut = false;
    }

    //Picture Check ==> Picture Formater
    if (empty($image)) {
        $error['image'] = 'Ce champ ne peut pas ??tre vide';
        $isSuccess = false;
    } else {
        $isUploadSuccess = true;
        $error['image'] = true;

        if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") {
            $error['image'] = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) {
            $error['image'] = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if ($_FILES["image"]["size"] > 500000) {
            $error['image'] = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                $error['image'] = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    //Return Data
    $data = array();

    if (in_array(false, $error)) {
        $data['error'] = $error;
    }

    // $var = [IF] ? [THEN] : [ELSE];
    $data['log']            = isset($login)     ? $login     : false;
    $data['name']           = isset($name)      ? $name      : false;
    $data['fname']          = isset($firstname) ? $firstname : false;
    $data['mail']           = isset($mail)      ? $mail      : false;
    $data['pass']           = isset($pass)      ? $pass      : false;
    $data['role']           = isset($role)      ? $role      : false;
    $data['User_Bank']      = isset($bank)      ? $bank      : false;
    $data['User_Activity']  = isset($activity)  ? $activity  : false;
    $data['User_Age']       = isset($age)       ? $age       : false;
    $data['User_Birthday']  = isset($bday)      ? $bday      : false;
    $data['User_Point']     = isset($point)     ? $point     : false;
    $data['desc']           = isset($desc)      ? $desc      : false;
    $data['type']           = isset($type)      ? $type      : false;
    $data['statut']         = isset($statut)    ? $statut    : false;
    $data['content']        = isset($content)   ? $content   : false;
    $data['date']           = isset($date)      ? $date      : false;
    $data['tag']            = isset($tag)       ? $tag       : false;
    $data['link']           = isset($image)     ? $image     : false;

    unset($_POST);
    return $data;
}

function checkerror($for, $error)
{
    var_dump($for);
    var_dump($error);

    switch ($for) {
        case 'user':
        case 'admin':
            if ($error['name'] === false || $error['mail'] === false || $error['pass'] === false) {
                $result = false;
            } else {
                $result = true;
            }
            break;

        case 'activity':
            if ($error['name'] !== false || $error['desc'] !== false || $error['content'] !== false || $error['price'] !== false) {
                $result = false;
            } else {
                $result = true;
            }
            break;

        case 'picture':
            if ($error['name'] !== false || $error['desc'] !== false || $error['statut'] !== false || $error['tags'] !== false || $error['image'] !== false) {
                $result = false;
            } else {
                $result = true;
            }
            break;

        default:
            $result = false;
            break;
    }

    var_dump($result);
    return $result;
}

function gethome()
{
    $activity = new ActivityController();
    $activity = $activity->index();
    // var_dump($activity);

    foreach ($activity as $key => $value) {
        // var_dump($value);

        echo "
        <article>
            <div class='stages'>
                <h3>$value->_name</h3>

                <p>
                    $value->_content
                </p>

                <p>
                    $value->_description
                </p>

                <a class='button' href='#'>click here</a>
            </div>

            <div class='player' id=$value->_media></div>
        </article>";
    }
}

function checklog($login)
{
    $mregex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";

    if (preg_match($mregex, $login)) {
        return 'mail';
    } else {
        return 'login';
    }
}

function existadmin($data)
{
    $admin = new AdminController();
    $admins = $admin->index();
    $login = checklog($data);

    $adminMail = array();
    foreach ($admins as $key => $value) {
        array_push($adminMail, $value->_email);
    }

    $adminLogin = array();
    foreach ($admins as $key => $value) {
        array_push($adminLogin, $value->_login);
    }

    switch ($login) {
        case 'mail':
            if (in_array($data, $adminMail)) {
                return true;
            } else {
                return false;
            }
            break;

        case 'login':
            if (in_array($data, $adminLogin)) {
                return true;
            } else {
                return false;
            }
            break;

        default:
            return false;
            break;
    }
}

function getactivities()
{
    $activity = new ActivityController();
    $activity = $activity->index();

    foreach ($activity as $key => $value) {
        $typeid = $value->_type;
        $type = new TypeController;
        $type = $type->show($typeid);
        $type = $type->_name;

        echo "
            <article>
                <div class='stages'>
                    <h2> $value->_name </h2>
                    
                    <h3> Description : </h3>
                    <p> $value->_description </p>

                    <h3> Content : </h3>
                    <p> $value->_content </p>
                                    
                    <h3> Date :</h3>
                    <p> $value->_date </p>
                    
                    <h3> Activity Type :</h3>
                    <p> $type </p>

                    <h3> Prices :</h3>
                    <p> $value->_price ??? </p>

                    <p> $value->_media </p>
    
                    <a class='button' href='#'>More info</a>
                </div>
    
                <div class='player' id=$value->_media></div>
            </article>";
    }
}

function getphoto(){

    $picture = new PictureController();
    $picture = $picture->index();

    foreach ($picture as $key => $value) {

        $tagid = $value->_tags;
        $tag = new TagController;
        $tag = $tag->show($tagid);
        $tag = $tag->_name;

        echo "
            <article>
                <div class='stages'>
                    <p>$tag</p>
                    <p>$value->_description</p>
                    <a class='button' href='#'>click here</a>
                </div>
                <div class='player' id=$value->_link></div>
            </article>";
    }
}