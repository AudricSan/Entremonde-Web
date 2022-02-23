<?php
require_once('DAO.php');

class ActivityDAO extends DAO{
    
    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct(){
        // Change the values according to your hosting.
        $this->username = env('DB_USERNAME', 'root');       //The login to connect to the DB
        $this->password = env('DB_PASSWORD', '');           //The password to connect to the DB
        $this->host =     env('DB_HOST', 'localhost');      //The name of the server where my DB is located
        $this->dbname =   env('DB_NAME');                   //The name of the DB you want to attack.
        $this->table =    "Activity";                       // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll(){
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $activities = array();

            foreach ($results as $result) {
                array_push($activities, $this->create($result));
            }

            return $activities;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE Activity_ID = ?");
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
        
        // NOTE DUMP OF OBJECT CREATE 
        var_dump($result);
        return new Activity(
            $result['Activity_ID'],
            $result['Activity_Name'],
            $result['Activity_Description'],
            $result['Activity_Statut'],
            $result['Activity_Content'],
            $result['Activity_Type'],
            $result['Activity_Date']
        );
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE Activity_ID = ?");
            $statement->execute([
                $id
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function store($data)
    {
        if (empty($data['name']) || empty($data['desc']) || empty($data['cont']) || empty($data['date']) || empty($data['type']) || empty($data['stat'])) {
            return false;
        }

        $activity = $this->create([
            "_name" =>        $data["name"],
            "_description" => $data["desc"],
            "_content" =>     $data["cont"],
            "_date" =>        $data["date"],
            "_type" =>        $data["type"],
            "_statut" =>      $data["stat"],
            "_id" =>          0
        ]);

        if ($activity) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (activity_Mail, activity_Login, activity_Password, activity_Name, activity_Firstname, activity_Role) VALUES (?, ?, ?, ?, ?, ?)");
                $statement->execute([
                    $activity->_name,
                    $activity->_description,
                    $activity->_statut,
                    $activity->_content,
                    $activity->_date,
                    $activity->_type,
                    $activity->_id
                ]);

                $activity->id = $this->connection->lastInsertId();
                return $activity;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }

    public function update($id, $data)
    {
        if (!$id || empty($data['name']) || empty($data['desc']) || empty($data['cont']) || empty($data['date']) || empty($data['type']) || empty($data['stat'])) {
            return false;
        }

        $activity = $this->create([
            "_id" => $id,
            "_name" => $data["name"],
            "_description" => $data["desc"],
            "_content" => $data["cont"],
            "_date" => $data["date"],
            "_type" => $data["type"],
            "_statut" => $data["stat"],
        ]);

        if ($activity) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET Activity_Name = ?, Activity_Description = ?, Activity_Statut = ?, Activity_Content = ?, Activity_Date = ?, Activity_Type = ? WHERE Activity_ID = ?");
                $statement->execute([
                    $activity->_name,
                    $activity->_description,
                    $activity->_statut,
                    $activity->_content,
                    $activity->_date,
                    $activity->_type,
                    $activity->_id
                ]);

                return $activity;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }
}
