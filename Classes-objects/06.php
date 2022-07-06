<?php
class SurveyData
{
    private int $surveyed;
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct(int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        $this->surveyed = $surveyed;
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function getSurveyed(): string
    {
        return "Total number of people surveyed: $this->surveyed." . PHP_EOL;
    }

    public function getEnergyDrinkers(): string
    {
        $energyDrinkers = floor($this->surveyed * $this->purchased_energy_drinks);
        return "Approximately $energyDrinkers bought at least one energy drink." . PHP_EOL;
    }

    public function getCitrusDrinkers(): string
    {
        $energyDrinkers = floor($this->surveyed * $this->purchased_energy_drinks);
        $citrusDrinkers = floor($energyDrinkers * $this->prefer_citrus_drinks);
        return "$citrusDrinkers of those $energyDrinkers prefer citrus flavored energy drinks." . PHP_EOL;
    }
}

$survey1 = new SurveyData(12467, 0.14, 0.64);

echo $survey1->getSurveyed();
echo $survey1->getEnergyDrinkers();
echo $survey1->getCitrusDrinkers();
