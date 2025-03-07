<?php 

class Contact {

    private $id;
    private $name; 
    private $email; 
    private $phoneNumber;

    public function __construct($id, $name, $email, $phoneNumber) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getId() : ?int 
    {
        return $this->id;
    }

    public function setName($name) 
    {
        $this->name = $name;
    }

    public function getName() : ?string 
    {
        return $this->name;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function getEmail() : ?string 
    {
        return $this->email;
    }

    public function setPhoneNumber($phoneNumber) 
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber() : ?string 
    {
        return $this->phoneNumber;
    }
}