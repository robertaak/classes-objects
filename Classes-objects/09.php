<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function showUserNameAndBalance(): string
    {
        $formatted = number_format(abs($this->balance), 2, ".", ' ');
        if ($this->balance < 0) {
            return "$this->name, -$$formatted" . PHP_EOL;
        }
        return "$this->name, $$formatted" . PHP_EOL;
    }


}

$ben = new BankAccount('Benson', 17.50);

echo $ben->showUserNameAndBalance();