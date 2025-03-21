<?php 

class Contact {

    // private int $id;
    // private string $name; 
    // private string $email; 
    // private string $phoneNumber;

    // public function __construct(?int $id = null, ?string $name, ?string $email, ?string $phoneNumber) 
    // {
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->email = $email;
    //     $this->phoneNumber = $phoneNumber;
    // }


    public function __construct(protected int $id, protected string $name, protected string $email, protected string $phoneNumber) 
    {
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

    /**
     * Renvoie un contact sous forme de chaîne de caractères
     */
    public function toString() : string
    {
        return $this->id . ", " . $this->name . ", " . $this->email . ", " . $this->phoneNumber . "\n";
    }

    /**
     * Renvoie un objet Contact à partir d'une ligne de la base de données
     */
    public static function fromDatabaseRow(array $array): Contact
    {
        $contact = new Contact($array['id'], $array['name'], $array['email'], $array['phone_number']);
        return $contact;
    }
}