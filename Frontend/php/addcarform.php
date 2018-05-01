<?php

/*
'make' list of possible makes - alpha

'doors' - list of possible door options - numerical

'petrol' - list of possible petrol - alpha

'body' - list of possible bodies - alpha

'transmission' - transmission type - alpha
*/

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
    }

    function refreshValues()
    {
        //Calls to database to get values for fields
    }

}

?>