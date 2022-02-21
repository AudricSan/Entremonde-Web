<?php
class AdminController {
    private $dao;
    
    public function __construct () {
        $this->dao = new AdminDAO();
    }
    
    public function index () {
        $admins = $this->dao->fetchAll();
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
        $this->dao->store($data);
    }
}
?>