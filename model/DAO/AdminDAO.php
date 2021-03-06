<?php

class AdminDAO
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
        $this->table =    "Admin";                        // The table to attack

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function fetchAll()
    {
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

    public function fetch($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE Admin_ID = ?");
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
        return new Admin(
            $result['Admin_ID'],
            $result['Admin_Mail'],
            $result['Admin_Login'],
            $result['Admin_Password'],
            $result['Admin_Name'],
            $result['Admin_Firstname'],
            $result['Admin_Role']
        );
    }

    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE Admin_ID = ?");
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
            unset($data);
            unset($_POST);
            return false;
        }

        $data = checkinput($data);
        $error = checkerror('admin', $data['error']);

        if ($error === false) {
            return false;
        }

        $admin = $this->create([
            "Admin_ID" => 0,
            'Admin_Mail'  => $data['mail'],
            'Admin_Login' => $data['log'],
            'Admin_Password'  => $data['pass'],
            'Admin_Name'  => $data['name'],
            'Admin_Firstname' => $data['fname'],
            'Admin_Role'  => $data['role']
        ]);

        if ($admin) {
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (Admin_Mail, Admin_Login, Admin_Password, Admin_Name, Admin_Firstname, Admin_Role) VALUES (?, ?, ?, ?, ?, ?)");
                $statement->execute([
                    $admin->_email,
                    $admin->_login,
                    $admin->_password,
                    $admin->_name,
                    $admin->_firstname,
                    $admin->_role
                ]);

                $admin->id = $this->connection->lastInsertId();
                return $admin;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }

    public function update($id, $data)
    {
        if (!$id || empty($data['log']) || empty($data['name']) || empty($data['fname']) || empty($data['mail']) || empty($data['pass']) || empty($data['role'])) {
            return false;
        }

        $admin = $this->create([
            "_id" => $id,
            '_login' => $data['log'],
            '_name' => $data['name'],
            '_fname' => $data['fname'],
            '_mail' => $data['mail'],
            '_pass' => $data['pass'],
            '_role' => $data['role']
        ]);

        if ($admin) {
            try {
                $statement = $this->connection->prepare("UPDATE {$this->table} SET Admin_Login = ?, Admin_Name = ?, Admin_Firstname = ?, Admin_Mail = ?, Admin_Password = ?, Admin_Role = ? WHERE Admin_ID = ?");
                $statement->execute([
                    $admin->_login,
                    $admin->_name,
                    $admin->_fname,
                    $admin->_mail,
                    $admin->_pass,
                    $admin->_role
                ]);

                return $admin;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                return false;
            }
        }
    }

    public function login($data)
    {
        if (empty($data)) {
            return false;
        }

        $login      = $data['login'];
        $password   = $data['pass'];
        unset($data);

        $data = checklog($login);

        if ($data === 'login') {
            try {
                $statement = $this->connection->prepare("Select Admin_Password FROM {$this->table} WHERE Admin_Login = ?");
                $statement->execute([
                    $login
                ]);

                $hash = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
        } elseif ($data === 'mail') {
            try {
                $statement = $this->connection->prepare("Select Admin_Password FROM {$this->table} WHERE Admin_Mail = ?");
                $statement->execute([
                    $login
                ]);

                $hash = $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
        } else {
            return false;
        }

        $pass = password_verify($password, $hash['Admin_Password']);

        if ($pass === false) {
            return false;
        }

        unset($_POST);
        $_SESSION['admin'] = $login;
        return true;
    }
}
