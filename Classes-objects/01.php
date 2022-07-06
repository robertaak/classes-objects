<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }

    public function setAmount(int $newAmount): void
    {
        $this->amount = $newAmount;
    }

    public function setPrice(float $newPrice): void
    {
        $this->price = $newPrice;
    }

    public function printProduct(): string
    {
        return "$this->name, price $this->price, amount $this->amount";
    }
}

$item1 = new Product("Logitech mouse", 70.00, 14);
$item2 = new Product("iPhone 5s", 999.99, 3);
$item3 = new Product("Epson EB-UO5", 440.46, 1);

echo $item1->printProduct();
echo $item2->printProduct();
echo $item3->printProduct();

$item1->setAmount(18);
$item3->setPrice(670.56);

echo $item1->printProduct();
echo $item2->printProduct();
echo $item3->printProduct();
