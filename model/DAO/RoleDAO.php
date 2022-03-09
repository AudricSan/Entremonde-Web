<?php

class RoleDAO
{
    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct()
    {
        // Change the values according to your hosting.
        $this->username = env('DB_USERNAME', 'root');     //The login to connect to the DB
        $this->password = env('DB_PASSWORD', '');         //The password to connect to the DB
        $this->host =     env('DB_HOST', 'localhost');    //The name of the server where my DB is located
        $this->dbname =   env('DB_NAME');                 //The name of the DB you want to attack.
        $this->table =    "role";                        // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $Roles = array();

            foreach ($results as $result) {
                array_push($Roles, $this->create($result));
            }

            return $Roles;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE Role_ID = ?");
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $this->create($result);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function create($result)
    {
        if (!$result) {
            return false;
        }

        return new Role(
            $result['Role_ID'],
            $result['Role_Name']
        );
    }
}
