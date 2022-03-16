<?php
class TypeController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TypeDAO();
    }

    public function index()
    {
        $types = $this->dao->fetchAll();
        return $types;
    }

    public function show($id)
    {
        $type = $this->dao->fetch($id);
        return $type;
    }

    public function create()
    {
        include('../view/type/form.php');
    }
}
