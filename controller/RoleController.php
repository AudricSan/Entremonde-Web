<?php
class RoleController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new RoleDAO();
    }

    public function index()
    {
        $roles = $this->dao->fetchAll();
        return $roles;
    }

    public function show($id)
    {
        $role = $this->dao->fetch($id);
        return $role;
    }

    public function create()
    {
        include('../view/roles/form.php');
    }
}
