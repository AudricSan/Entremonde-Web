<?php
require_once('DAO.php');

class UserDAO extends DAO{
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
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $admins = array();

            foreach ($results as $result) {
                array_push($admins, $this->create($result));
            }

            return $admins;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetch($id){
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE User_ID = ?");
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $this->create($result);
        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function create($result){
        if (!$result) {
            return false;
        }

        var_dump($result);
        return new User(
            $result['User_ID'],
            $result['User_Name'],
            $result['User_Firstname'],
            $result['User_login'],
            $result['User_Password'],
            $result['User_Mail'],
            $result['User_Bank'],
            $result['User_Activity'],
            $result['User_Age'],
            $result['User_Birthday'],
            $result['User_Point']
        );
    }

    public function delete($id){
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE User_ID = ?");
            $statement->execute([
                $id
            ]);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function store($data){
        if (empty($data['log']) || empty($data['name']) || empty($data['fname']) || empty($data['mail']) || empty($data['pass']) || empty($data['role'])) {
            return false;
        }

        $user = $this->create([
            'id'         => 0,
            '_name'      => $data['User_Name'],
            '_firstname' => $data['User_Firstname'],
            '_login'     => $data['User_Login'],
            '_password'  => $data['User_Password'],
            '_email'     => $data['User_Mail'],
            '_bank'      => $data['User_Bank'],
            '_activity'  => $data['User_Activity']
        ]);

        if ($user) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (Admin_Mail, Admin_Login, Admin_Password, Admin_Name, Admin_Firstname, Admin_Role) VALUES (?, ?, ?, ?, ?, ?)");
                $statement->execute([
                    $user->_id,
                    $user->_name,
                    $user->_firstname,
                    $user->_login,
                    $user->_password,
                    $user->_email,
                    $user->_bank,
                    $user->_activity
                ]);

                $user->id = $this->connection->lastInsertId();
                return $user;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }

    public function update($id, $data){
        if (!$id || empty($data['log']) || empty($data['name']) || empty($data['fname']) || empty($data['mail']) || empty($data['pass']) || empty($data['role'])) {
            return false;
        }

        $user = $this->create([
            "_id" => $id,
            '_login' => $data['log'],
            '_name' => $data['name'],
            '_fname' => $data['fname'],
            '_mail' => $data['mail'],
            '_pass' => $data['pass'],
            '_role' => $data['role']
        ]);

        if ($user) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET User_Name = ?, User_Firstname = ?, User_login = ?, User_Password = ?, User_Mail = ?, User_Bank = ?, User_Activity = ? WHERE User_ID = ?");
                $statement->execute([
                    $user->_name,
                    $user->_firstname,
                    $user->_login,
                    $user->_password,
                    $user->_email,
                    $user->_bank,
                    $user->_activity,
                    $user->_id
                ]);

                return $user;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }
}
