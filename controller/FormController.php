<?php
class FormController {
    public $dao;
    
    public function __construct () {
        $this->dao = new FormDAO();
    }
    
    public function index () {
        var_dump($_POST);
    }
    
    public function show ($id) {
        var_dump($_POST);

    }
    
    public function create () {
        var_dump($_POST);

    }
    
    public function store($data) {
        var_dump($_POST);
    }
}

?>