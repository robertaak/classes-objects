<?php

class App

{
    private SavingsAccount $savingsAccount;

    public function __construct()
    {
        $this->savingsAccount = new SavingsAccount();
    }
    public function run(): void

    {
        $this->savingsAccount->setStartBalance();

        $this->savingsAccount->setAnnualRate();

        $this->savingsAccount->setTime();

        for ($i = 0; $i < $this->savingsAccount->time; $i++) {

            $this->savingsAccount->addDeposit();

            $this->savingsAccount->subtract();

            $this->savingsAccount->addMonthlyInterest();

        }
        echo 'Total deposited: $' . number_format($this->savingsAccount->getTotalDeposited(), 2, '.', ',') . PHP_EOL;
        echo 'Total withdrawn: $' . number_format($this->savingsAccount->getTotalSubtracted(), 2, '.', ',') . PHP_EOL;
        echo 'Interest earned: $' . number_format($this->savingsAccount->getTotalInterest(), 2, '.', ',') . PHP_EOL;
        echo 'Ending balance: $' . number_format($this->savingsAccount->getBalance(), 2, '.', ',') . PHP_EOL;
    }
}

class SavingsAccount
{
    private float $balance;
    private float $annualInterestRate;
    private array $totalSubtracted = [];
    private array $totalDeposit = [];
    private array $totalInterest = [];


    public function setStartBalance(): void
    {
        $balance = (float) readline ('How much money is in the account? ');
        $this->balance = $balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setAnnualRate(): void
    {
        $annualInterestRate = (float) readline('Enter the annual interest rate: ');
        $this->annualInterestRate = $annualInterestRate;
    }

    public function setTime(): void
    {
        $time = (float) readline('How long has the account been opened? ');
        $this->time = $time;
    }

    public function subtract(): void
    {
        $subtracted = (float) readline ('Enter amount withdrawn for ');

        $this->totalSubtracted[] = $subtracted;
        $this->balance -= $subtracted;
    }
    public function addDeposit(): void
    {

        $deposit = (float) readline ('Enter amount deposited for month ');

        $this->totalDeposit[] = $deposit;
        $this->balance += $deposit;
    }
    public function addMonthlyInterest(): void
    {
        $monthlyInterest = $this->annualInterestRate / 12 * $this->balance;

        $this->totalInterest[] = $monthlyInterest;
        $this->balance += $monthlyInterest;

    }

    public function getTotalSubtracted(): float
    {
        return array_sum($this->totalSubtracted);
    }

    public function getTotalDeposited(): float
    {
        return array_sum($this->totalDeposit);
    }

    public function getTotalInterest(): float
    {
        return array_sum($this->totalInterest);
    }
}

$app = new App();
$app->run();



