<?php
class PictureController {
    private $dao;
    
    public function __construct () {
        $this->dao = new PictureDAO();
    }
    
    public function index () {
        $pictures = $this->dao->fetchAll();
        return $pictures;
        
        include('../view/picture/list.php');
    }
    
    public function show ($id) {
        $picture = $this->dao->fetch($id);
        include('../view/picture/one.php');
    }
    
    public function create () {
        include('../view/picture/form.php');
    }
    
    public function store($data) {
        $this->dao->store($data);
    }
}
?>