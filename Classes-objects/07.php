<?php

class Dog
{
    private string $name;
    private string $gender;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $gender, Dog $mother = null, Dog $father = null)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string
    {
        if (!$this->father) return 'unknown';

        return $this->father->name;
    }

    public function hasSameMOtherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mother;
    }
}

$dogs = [
    $sparky = new Dog('Sparky', 'male'),
    $sam = new Dog('Sam', 'male'),
    $lady = new Dog('Lady', 'female'),
    $molly = new Dog('Molly', 'female'),

    $buster = new Dog('Buster', 'male', $lady, $sparky),
    $rocky = new Dog('Rocky', 'male', $molly, $sam),
    $max = new Dog('Max', 'male', $lady, $rocky),
    $coco = new Dog('Coco', 'female', $molly, $buster),
];
var_dump($max->hasSameMOtherAs($buster));  //true
var_dump($coco->hasSameMOtherAs($buster));  //false
var_dump($coco->fathersName());             // buster

