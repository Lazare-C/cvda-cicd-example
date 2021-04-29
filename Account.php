<?php


class TooShortPassword extends Exception { }
class BadEmailAdress extends Exception { }

class Account
{

    private string $name;
    private string $surname;
    private string  $email;
    private string  $password;

    /**
     * Account constructor.
     * @param String $Name
     * @param String $Surname
     * @param String $email
     * @param String $password
     */
    public function __construct(string $name, string $Surname, string $email, string $password)
    {
        $this->name = $name;
        $this->surname = $Surname;
        $this->email = $email;
        $this->password = $password;
    }

    public function __toString()
    {
        return "Name: " . $this->name . "\n".
            "Surname: " . $this->surname . "\n".
            "Email: " . $this->email . "\n".
            "Password: " . $this->password . "\n";
    }


    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param String $Name
     */
    public function setName(string $Name): void
    {
        $this->name = $Name;
    }

    /**
     * @return String
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param String $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        if(strpos($email, '@')){
            $this->email = $email;
        }else{
            throw new BadEmailAdress();
        }


    }

    /**
     * @return String
     */
    public function getpassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setpassword(string $password): void
    {
        if(strlen($password) <=3){
            throw new TooShortPassword();
        }else{
            $this->password = $password;
        }



    }




}
