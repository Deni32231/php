<?php

class Company
{
    private $name;
    private $phone;
    private $email;

    public function __construct($name, $phone, $email)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
class Supplier extends Company
{
    public $bank_account = new Supplier_bank_accout();


}

class Customer extends Company
{
    public $bank_account = new Customer_bank_account();
}

class Bank_account
{
    private $balance;

    public function __construct()
    {
        $this->balance = 0;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function changeBalance($amount)
    {
        $this->balance = $this->balance + $amount;
    }
}

class Customer_bank_account extends Bank_account
{
    private $operations = [];

    public function makeOperation($supplierId, $operation_name, $amount)
    {
        array_push($this->operations, [$supplierId, $operation_name, $amount]);
        $this->changeBalance(-$amount);
    }
}

class Supplier_bank_accout extends Bank_account
{
    private $operations = [];

    public function makeOperation($customerId, $operation_name, $amount)
    {
        array_push($this->operations, [$customerId, $operation_name, $amount]);
        $this->changeBalance($amount);
    }
}

?>