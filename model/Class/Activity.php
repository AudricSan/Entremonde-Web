<?php

class Activity
{
    private string $_name;
    private string $_description;
    private string $_content;
    private string $_media;
    private        $_date;

    private int    $_type;
    private int    $_statut;
    private int    $_price;
    private int    $_id;

    //Constructeur
    public function __construct($id, $name, $desc, $stat, $cont, $type, $date, $price, $media)
    {
        $this->_name = $name;
        $this->_description = $desc;
        $this->_content = $cont;
        $this->_media = $media;
        $this->_type = intval($type);
        $this->_date = $date;
        $this->_statut = intval($stat);
        $this->_price = intval($price);
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