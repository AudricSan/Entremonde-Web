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

    $exist = array();

    foreach ($admin as $key => $value) {
        $data['mail'] === $value->_email ? array_push($exist, true) : array_push($exist, false);
    }
    
    foreach ($user as $key => $value) {
        $data['mail'] === $value->_email ? array_push($exist, true) : array_push($exist, false);
    }

    $exist = in_array(false, $exist) ? false : true;

    if($exist === false){
        return false;
    }

    // var_dump($data);
    // $var = [IF] ? [THEN] : [ELSE];
    $name      = isset($data['name'])  ? $data['name']  : NULL;
    $firstname = isset($data['fname']) ? $data['fname'] : NULL;
    $mail      = isset($data['mail'])  ? $data['mail']  : NULL;
    $pass      = isset($data['pass'])  ? $data['pass']  : NULL;
    $pass2     = isset($data['pass2']) ? $data['pass2'] : NULL;
    $role      = isset($data['role'])  ? $data['role']  : NULL;

    $nregex = "/^[a-z 0-9-]{2,15}$/";
    $mregex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
    $pregex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{10,}$/";

    $error = array();

    //Unset Post
    unset($data);
    unset($_POST);

    //format data
    $name = strtolower($name);
    $firstname = strtolower($firstname);
    $mail = rtrim($mail);
    $mail = strtolower($mail);

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

        if (!preg_match($pregex, $pass)) {
            $error['pass'] = false;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $error['pass'] = true;
    } else {
        $error['pass'] = false;
    }

    if (in_array(false, $error)) {
        return $error;
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

    // $var = [IF] ? [THEN] : [ELSE];
    $data['log']            = isset($login)     ? $login     : NULL;
    $data['name']           = isset($name)      ? $name      : NULL;
    $data['fname']          = isset($firstname) ? $firstname : NULL;
    $data['mail']           = isset($mail)      ? $mail      : NULL;
    $data['pass']           = isset($pass)      ? $pass      : NULL;
    $data['role']           = isset($role)      ? $role      : NULL;
    $data['User_Bank']      = isset($bank)      ? $bank      : NULL;
    $data['User_Activity']  = isset($activity)  ? $activity  : NULL;
    $data['User_Age']       = isset($age)       ? $age       : NULL;
    $data['User_Birthday']  = isset($bday)      ? $bday      : NULL;
    $data['User_Point']     = isset($point)     ? $point     : NULL;

    return $data;
}
