<?php
class CarFormClass
{
    public $make;
    public $doors;
    public $petrol;
    public $body;
    public $transmission;

    function __construct()
    {
        $this->make = array();
        $this->door = array();
        $this->petrol = array();
        $this->body = array();
        $this->transmission = array();
        $this->refreshValues();
    }

    function __construct0()
    {
        $this->make = array("make");
        $this->door = array("door");
        $this->petrol = array("petrol");
        $this->body = array("body");
        $this->transmission = array("transmission");
    }

    function refreshValues()
    {
        //Calls to database to get values for fields
            //DB CODE GOES HERE
    }
}
?>