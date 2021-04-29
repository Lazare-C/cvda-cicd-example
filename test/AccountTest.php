<?php

require_once("../Account.php");
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{


    /**
     * @depends testConstruct
     */
    public function testGetName()
    {
        $account = new Account('Deboix', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame("Deboix", $account->getName());

    }
    public function testGetNameNull()
    {
        $account = new Account('', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame('', $account->getName());

    }


    public function testConstruct()
    {
        $this->expectException(ArgumentCountError::class);
        $account = new Account();
    }



    public function testSetpasswordTrue()
    {

        $account = new Account('', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame("abcde123456", $account->getpassword());


    }
    public function testSetpasswordFalse()
    {

        $this->expectException(TooShortPassword::class);
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setpassword("123");


    }

    public function testSetEmail()
    {
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setEmail("théo@gmail.com");
        $this->assertSame("théo@gmail.com", $account->getEmail());


    }

    public function testSetEmailFail()
    {
        $this->expectException(BadEmailAdress::class);
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setEmail("théoagmail.com");
    }

}
