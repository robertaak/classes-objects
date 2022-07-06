<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function withdrawal($withdrawal): float
    {
        return $this->balance -= $withdrawal;
    }

    public function deposit($deposit): float
    {
        return $this->balance += $deposit;
    }

    public function transfer(Account $toWho, $amount): void
    {
        $this->balance -= $amount;
        $toWho->balance += $amount;

        echo $this->name . " now has $" . $this->balance . PHP_EOL;
        echo $toWho->name . " now has $" . $toWho->balance . PHP_EOL;
    }


}

//YOUR FIRST ACCOUNT

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state" . PHP_EOL;
echo $bartosAccount->balance() . PHP_EOL;
echo $bartosSwissAccount->balance() . PHP_EOL;

$bartosAccount->withdrawal(20);
echo $bartosAccount->name() . " balance is now: " . $bartosAccount->balance() . PHP_EOL;
$bartosSwissAccount->deposit(200);
echo $bartosSwissAccount->name() . " balance is now: " . $bartosSwissAccount->balance() . PHP_EOL;

echo "Final state" . PHP_EOL;
echo $bartosAccount->balance() . PHP_EOL;
echo $bartosSwissAccount->balance() . PHP_EOL;

// YOUR FIRST MONEY TRANSFER

$mattsAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);

$mattsAccount->transfer($myAccount, 100);

// MONEY TRANSFERS

$a = new Account('A', 100);
$b = new Account('B', 0);
$c = new Account('C', 0);

$a->transfer($b, 50);
$b->transfer($c, 25);


