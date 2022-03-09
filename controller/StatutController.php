<?php
class StatutController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new StatutDAO();
    }

    public function index()
    {
        $statuts = $this->dao->fetchAll();
        return $statuts;
    }

    public function show($id)
    {
        $statut = $this->dao->fetch($id);
        return $statut;
    }

    public function create()
    {
        include('../view/statut/form.php');
    }
}
