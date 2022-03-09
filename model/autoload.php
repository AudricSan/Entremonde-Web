<?php

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
    //Exist ?
    $user = new UserDAO;
    $admin = new AdminDAO;

    $user = $user->fetchAll();
    $admin = $admin->fetchAll();

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

    $exist = array();
    foreach ($admin as $key => $value) {
        $mail === $value->_email ? array_push($exist, true) : array_push($exist, false);
    }

    $exist = in_array(false, $exist) ? true : false;

    if ($exist === false) {
        return false;
    }

    $exist = array();
    foreach ($user as $key => $value) {
        $mail === $value->_email ? array_push($exist, true) : array_push($exist, false);
    }

    $exist = in_array(false, $exist) ? true : false;

    if ($exist === false) {
        return false;
    }

    //Regex
    $nregex = "/^[a-z 0-9-]{2,15}$/";
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

    //Check data format
    if (preg_match($nregex, $name)) {
        $error['name'] = true;
    } else {
        $error['name'] = false;
    }

    if (preg_match($mregex, $mail)) {
        $error['mail'] = true;
    } else {
        $error['mail'] = false;
    }

    if ($pass === $pass2) {
        unset($pass2);

        if (preg_match($pregex, $pass)) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $error['pass'] = true;
        } else {
            $error['pass'] = false;
        }
    } else {
        $error['pass'] = false;
    }

    if (strlen($content) > 0) {
        $error['content'] = true;
    } else {
        $error['content'] = false;
    }

    if (strlen($desc) > 0) {
        $error['desc'] = true;
    } else {
        $error['desc'] = false;
    }
    
    if ($price > 0) {
        $error['price'] = true;
    } else {
        $error['price'] = false;
    }

    //confert Data
    $name = ucfirst($name);
    $firstname = ucfirst($firstname);

    //Generate Login
    $lfname = substr($firstname, 0, 3);
    $lname = substr($name, 0, 3);
    $login = $lname . $lfname . random_int(0, 999);
    // $login = substr($login, 0, 9);

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

    return $data;
}

function checkerror($for, $error)
{
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
            if ($error['name'] === false || $error['desc'] === false || $error['content'] === false || $error['price'] === false) {
                $result = false;
            } else {
                $result = true;
            }
            break;
            
        case 'picture':
            if ($error['name'] === false || $error['desc'] === false || $error['statut'] === false || $error['tags'] === false) {
                $result = false;
            } else {
                $result = true;
            }
            break;

        default:
            $result = false;
            break;
    }

    return $result;
}
