<?php
class FormController {
    private $dao;
    
    public function __construct () {
        $this->dao = new ActivityDAO();
    }
    
    public function index () {
        return 'index';

    }
    
    public function show ($id) {
        return 'show';
    }
    
    public function create () {
        return 'create';    }
    
    public function store($data) {
        return 'store';
    }
}
?>