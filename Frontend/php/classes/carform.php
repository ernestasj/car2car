<?php
class CarFormClass
{
    public $make;
    public $doors;
    public $petrol;
    public $body;
    public $transmission;

    function __constructor()
    {
        $this->make = array();
        $this->door = array();
        $this->petrol = array();
        $this->body = array();
        $this->transmission = array();
        $this->refreshValues();
    }

    function refreshValues()
    {
        //Calls to database to get values for fields
            //DB CODE GOES HERE
    }
}
?>