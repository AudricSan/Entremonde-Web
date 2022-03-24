<?php
class AdminController {
    private $dao;
    
    public function __construct () {
        $this->dao = new AdminDAO();
    }
    
    public function index () {
        $admins = $this->dao->fetchAll();
        return $admins;
        
        include('../view/admin/list.php');
    }
    
    public function show ($id) {
        $admin = $this->dao->fetch($id);
        include('../view/admin/one.php');
    }
    
    public function create () {
        include('../view/admin/form.php');
    }
    
    public function store($data) {
        unset($_POST);

        if(isset($data)){
            $this->dao->store($data);
        }
    }

    public function login($data)
    {
        unset($_POST);        
        $result = $this->dao->login($data);

        if ($result) {
            header('location: /admin');
        }else{
            header('location: /');
        }
    }
}
?>