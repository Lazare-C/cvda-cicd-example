<?php


use demo\Account;
use demo\BadEmailAdress;
use demo\TooShortPassword;
use PHPUnit\Framework\TestCase;


class AccountTest extends TestCase
{


    /**
     * @covers \demo\Account
     * @covers \demo\Account::getName
     */
    public function testGetName()
    {
        $account = new Account('Deboix', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame("Deboix", $account->getName());

    }

    /**
     * @covers \demo\Account
     * @covers \demo\Account::getName
     */
    public function testGetNameNull()
    {
        $account = new Account('', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame('', $account->getName());

    }




    /**
     * @covers \demo\Account
     * @covers \demo\Account::setpassword
     */
    public function testSetpasswordTrue()
    {

        $account = new Account('', "Théo", "theo@gmail.com", "abcde123456");
        $this->assertSame("abcde123456", $account->getpassword());


    }

    /**
     * @covers \demo\Account
     * @covers \demo\Account::setpassword
     */
    public function testSetpasswordFalse()
    {

        $this->expectException(TooShortPassword::class);
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setpassword("123");


    }

    /**
     * @covers \demo\Account
     * @covers \demo\Account::setEmail
     */
    public function testSetEmail()
    {
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setEmail("théo@gmail.com");
        $this->assertSame("théo@gmail.com", $account->getEmail());


    }

    /**
     * @covers \demo\Account
     * @covers \demo\Account::setEmail
     */
    public function testSetEmailFail()
    {
        $this->expectException(BadEmailAdress::class);
        $account = new Account('', "Théo", "theo@gmail.com", "123");
        $account->setEmail("théoagmail.com");
    }

}
