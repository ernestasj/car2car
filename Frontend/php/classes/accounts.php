<?php
class Account {
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    public $licence;
    public $cardtype;
    public $ccnumber;
    public $expiry;
    public $cvc;
    public $cardname;

    function __construct($email, $password, $firstname,
                         $lastname, $licence, $cardtype, 
                         $ccnumber, $expiry, $cvc, $cardname) 
    {
        //Constructor
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->licence = $licence;
        $this->cardtype = $cardtype;
        $this->ccnumber = $ccnumber;
        $this->expiry = $expiry;
        $this->cvc = $cvc;
        $this->cardname = $cardname;
    }

    function WriteDB($db)
    {
        //Writes to database
            //Needs to go here
    }
}
?>