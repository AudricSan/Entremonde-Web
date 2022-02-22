<?php

class Admin
{
    private string  $_login;
    private string  $_name;
    private string  $_firstname;
 
    private string  $_email;
    private string  $_password;

    private int     $_id;
    private int     $_role;

    //Constructeur
    public function __construct($id, $mail, $log, $pass, $name, $fname, $role)
    {
        $this->_login = $log;
        $this->_name = $name;
        $this->_firstname = $fname;

        $this->_email = $mail;
        $this->_password = $pass;

        $this->_id = intval($id);
        $this->_role = intval($role);
    }

    //SUPER SETTER
    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop = $value;
        }
    }

    //SUPER GETTER
    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }
}