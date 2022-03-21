<?php
class UserController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new UserDAO();
    }

    public function index()
    {
        $users = $this->dao->fetchAll();
        include('../view/user/list.php');
    }

    public function show($id)
    {
        $user = $this->dao->fetch($id);
        include('../view/user/one.php');
    }

    public function create()
    {
        include('../view/user/form.php');
    }

    public function store($data)
    {
        $this->dao->store($data);
    }

    public function login($data)
    {
        unset($_POST);
        var_dump($data);
        
        // $data $this->dao->login($data);

    }
}
