<?php
require_once('DAO.php');

class FormDAO{
    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct(){
        // Change the values according to your hosting.
        $this->username = env('DB_USERNAME', 'root');    //The login to connect to the DB
        $this->password = env('DB_PASSWORD', '');        //The password to connect to the DB
        $this->host =     env('DB_HOST', 'localhost');   //The name of the server where my DB is located
        $this->dbname =   env('DB_NAME');                //The name of the DB you want to attack.
        $this->table =    "User";                        // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll(){
        echo 'fetchall';
    }

    public function fetch($id){
        echo 'fetch';

    }

    public function create($result){
        echo 'create';

    }

    public function delete($id){
        echo 'delete';

    }

    public function store($data){
        echo 'store';
    }

    public function update($id, $data){
        echo 'update';

    }
}
