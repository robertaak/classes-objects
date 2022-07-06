<?php

class FuelGauge
{
    private float $fuel;

    public function __construct(float $fuel)
    {
        $this->fuel = $fuel;
    }

    public function reportAmount(): float
    {
        return $this->fuel;
    }

    public function addFuel(): float
    {
        if ($this->fuel < 70) {
            $this->fuel += 1;
        }
        return $this->fuel;
    }

    public function runFuel(): float
    {
        if ($this->fuel > 0) {
            $this->fuel -= 1;
        }
        return $this->fuel;
    }
}

class Odometer
{
    private int $mileage;

    public function __construct(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function reportMileage(): int
    {
        return $this->mileage;
    }

    public function addMile(): int
    {
        if ($this->mileage < 999999) {
            $this->mileage += 1;
        } else {
            $this->mileage = 0;
        }
        return $this->mileage;

    }
}

class Car
{
    private int $fuelEconomy;
    private Odometer $mileage;
    private FuelGauge $fuelLevel;

    public function __construct(int $fuelEconomy, int $km, int $fuel)
    {
        $this->fuelEconomy = $fuelEconomy;
        $this->mileage = new Odometer($km);
        $this->fuelLevel = new FuelGauge($fuel);
    }

    public function start(): void
    {
        $num = 0;
        while ($this->fuelLevel->reportAmount() > 0) {
            $num++;
            $this->mileage->addMile();
            if ($num % $this->fuelEconomy == 0) {
                $this->fuelLevel->runFuel();
            }
            echo "Mileage: {$this->mileage->reportMileage()} km" . PHP_EOL;
            echo "Fuel left: {$this->fuelLevel->reportAmount()} l" . PHP_EOL;
        }
    }

    public function fillTheTank(int $liters)
    {
        for ($i = 0; $i < $liters; $i++) {
            $this->fuelLevel->addFuel();
        }
    }


}

$mazda = new Car(10, 0, 0);

$mazda->fillTheTank(50);
$mazda->start();