<?php

class PictureDAO
{
    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct()
    {
        // Change the values according to your hosting.
        $this->username = env('DB_USERNAME', 'root');       //The login to connect to the DB
        $this->password = env('DB_PASSWORD', '');           //The password to connect to the DB
        $this->host =     env('DB_HOST', 'localhost');      //The name of the server where my DB is located
        $this->dbname =   env('DB_NAME');                   //The name of the DB you want to attack.
        $this->table =    "Picture";                        // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} where Picture_Statut	= 1");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $Pictures = array();

            foreach ($results as $result) {
                array_push($Pictures, $this->create($result));
            }

            return $Pictures;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE Picture_ID = ?");
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
        // var_dump($result);
        return new Picture(
            $result['Picture_ID'],
            $result['Picture_Name'],
            $result['Picture_Description'],
            $result['Picture_Statut'],
            $result['Picture_Tags'],
            $result['Picture_Link'],
        );
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE Picture_ID = ?");
            $statement->execute([
                $id
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function store($data)
    {
        unset($_POST);

        if (empty($data)) {
            echo ('THERE ARE NO DATA');
            return false;
        }

        // var_dump($data);
        $data = checkinput($data);
        $error = checkerror('picture', $data['error']);
        // var_dump($error);
        // var_dump($data);

        if ($error === false) {
            echo ('THERE ARE AN ERROR');
            unset($_POST);
            return false;
        }

        $Picture = $this->create([
            "Picture_ID"          =>  0,
            "Picture_Name"        =>  $data["name"],
            "Picture_Description" =>  $data["desc"],
            "Picture_Statut"      =>  $data["statut"],
            "Picture_Tags"        =>  $data["tag"],
            "Picture_Link"        =>  $data["link"],
        ]);

        if ($Picture) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (Picture_Name, Picture_Description, Picture_Statut, Picture_Tags, Picture_Link) VALUES (?, ?, ?, ?, ?)");

                $statement->execute([
                    $Picture->_name,
                    $Picture->_description,
                    $Picture->_statut,
                    $Picture->_tags,
                    $Picture->_link,
                ]);

                $Picture->id = $this->connection->lastInsertId();
                return $Picture;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }

        unset($_POST);
    }

    public function update($id, $data)
    {
        if (!$id || empty($data['name']) || empty($data['desc']) || empty($data['cont']) || empty($data['date']) || empty($data['type']) || empty($data['stat'])) {
            return false;
        }

        $Picture = $this->create([
            "_id" =>          $id,
            "_name" =>        $data["name"],
            "_description" => $data["desc"],
            "_statut" =>      $data["stat"],
            "_tags" =>        $data["tag"],
            "_link" =>        $data["link"],
        ]);

        if ($Picture) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET Picture_Name = ?, Picture_Description = ?, Picture_Statut = ?, Picture_Content = ?, Picture_Date = ?, Picture_Type = ? WHERE Picture_ID = ?");
                $statement->execute([
                    $Picture->_name,
                    $Picture->_description,
                    $Picture->_statut,
                    $Picture->_tags,
                    $Picture->_link,
                    $Picture->_id
                ]);

                return $Picture;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }
}
