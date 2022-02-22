<?php

class Picture
{
    private int     $_id;
    private string  $_name;
    private string  $_description;
    private int     $_statut;
    private string  $_tags;
    private string  $_link;

    //Constructeur
    public function __construct($id, $name, $desc, $stat, $tag, $link)
    {
        $this->_id          = intval($id);
        $this->_name        = $name;
        $this->_description = $desc;

        $this->_statut      = intval($stat);
        $this->_tags        = intval($tag);

        $this->_link        = $link;
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
