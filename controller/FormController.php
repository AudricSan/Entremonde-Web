<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entremonde";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class FormController
{
    public $dao;

    public function __construct()
    {
        $this->dao = new FormDAO();
    }

    public function index()
    {
    }

    public function show($id)
    {
    }

    public function create()
    {
    }

    public function store($data)
    {
        $this->dao->store($data);
    }
}

var_dump($_POST);
echo('<h3> START SCRIPT </h3>');

if (empty($_POST)) {
    echo ('NO POST');
    goto end;
}

//Set var
$name       = $_POST['name'];
$firstname  = $_POST['fname'];
$mail       = $_POST['mail'];
$pass       = $_POST['pass'];
$pass2      = $_POST['pass2'];

$nregex = "/^[a-z 0-9-]{2,15}$/";
$mregex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/";
$pregex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{10,}$/";

$error = array();

//Unset Post
unset($_POST);

$stmt = $conn->prepare("SELECT * FROM user WHERE user_mail = ?");
$stmt->execute([$mail]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result){
    $error['mail'] = 'Mail already Exist';
    goto end;
}

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

if(in_array(false, $error)){
    return $error;
}

//confert Data
$name = ucfirst($name);
$firstname = ucfirst($firstname);

//Generate Login
$lfname = substr($firstname, 0, 3);
$lname = substr($name, 0, 3);

$login = $lname . $lfname;

$stmt = $conn->prepare("SELECT * FROM user WHERE user_login = ?");
$stmt->execute([$login]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result){
    $error['login'] = 'login already Exist';
    $login = $lname . $lfname . random_int(0, 99999999);
    var_dump($error);
}else{
    $error['login'] = true;
}

//Insert in DB
$stmt = $conn->prepare("INSERT INTO user (User_Name, User_Firstname, User_Mail, User_Password, User_Login) value (?,?,?,?,?)");
$stmt->execute([$name, $firstname, $mail, $pass, $login]);
$error['insert'] = true;

end:
header('Location: ../public');