<?php 

class Contact {

    private int $id;
    private string $name; 
    private string $email; 
    private string $phoneNumber;

    public function __construct(int $id, string $name, string $email, string $phoneNumber) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getId() : ?int 
    {
        return $this->id;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getName() : ?string 
    {
        return $this->name;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getEmail() : ?string 
    {
        return $this->email;
    }

    public function setPhoneNumber(string $phoneNumber) 
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber() : ?string 
    {
        return $this->phoneNumber;
    } 

    public function toString() : string
    {
        return $this->id . ", " . $this->name . ", " . $this->email . ", " . $this->phoneNumber . "\n";
    }

    public static function fromDatabaseRow(array $array): Contact
    {
        $contact = new Contact($array['id'], $array['name'], $array['email'], $array['phone_number']);
        return $contact;
    }
}