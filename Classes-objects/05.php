<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {

        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setDay($newDay): int
    {
        return $this->day = $newDay;
    }

    public function setMonth($newMonth): int
    {
        return $this->month = $newMonth;
    }

    public function setYear($newYear): int
    {
        return $this->year = $newYear;
    }

    public function checkDate(): bool
    {
        return checkdate($this->month, $this->day, $this->year);
    }

    public function displayDate(): string
    {
        return "$this->month/$this->day/$this->year";
    }
}

$date1 = new Date(12, 13, 1997);
var_dump($date1);

var_dump($date1->checkDate());
var_dump($date1->displayDate());
var_dump($date1->getDay());
var_dump($date1->getYear());
var_dump($date1->getMonth());

