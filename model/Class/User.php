<?php

class User
{
    private string $_login;
    private string $_name;
    private string $_firstname;

    private string $_email;
    private string $_password;

    private string $_bank;

    private int    $_activity;
    private int    $_age;
    private        $_birthday;
    private int    $_point;
    private int    $_id;

    //Constructeur
    public function __construct($id, $name, $fname, $log, $pass, $mail, $bank, $act, $age, $birt, $point)
    {
        $this->_login = $log;
        $this->_name = $name;

        $this->_firstname = $fname;
        $this->_email = $mail;

        $this->_password = $pass;
        $this->_bank = $bank;

        $this->_activity = intval($act);

        $this->_age = intval($age);
        $this->_birthday = $birt;
        $this->_point = intval($point);

        $this->_id = intval($id);
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