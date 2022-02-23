<?php
class ActivityController {
    private $dao;
    
    public function __construct () {
        $this->dao = new ActivityDAO();
    }
    
    public function index () {
        $activities = $this->dao->fetchAll();
        include('../view/activity/list.php');
    }
    
    public function show ($id) {
        $activity = $this->dao->fetch($id);
        include('../view/activity/one.php');
    }
    
    public function create () {
        include('../view/activity/form.php');
    }
    
    public function store($data) {
        $this->dao->store($data);
    }
}
?>