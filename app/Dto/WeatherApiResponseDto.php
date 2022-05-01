<?php

namespace App\Dto;

class WeatherApiResponseDto
{
    /**
     * @var float
     */
    private $temperature;

    /**
     * @var int
     */
    private $windDirection;

    /**
     * @var float
     */
    private $windSpeed;

    /**
     * @var string
     */
    private $mainType;

    /**
     * @var float
     */
    private $temperatureFeels;

    /**
     * @var int
     */
    private $pressure;

    /**
     * @var string
     */
    private $cityName;

    public function __construct(
        float $temperature,
        int $windDirection,
        float $windSpeed,
        string $mainType,
        float $temperatureFeels,
        int $pressure,
        string $cityName
    )
    {

        $this->temperature = $temperature;
        $this->windDirection = $windDirection;
        $this->windSpeed = $windSpeed;
        $this->mainType = $mainType;
        $this->temperatureFeels = $temperatureFeels;
        $this->pressure = $pressure;
        $this->cityName = $cityName;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return int
     */
    public function getWindDirection(): int
    {
        return $this->windDirection;
    }

    /**
     * @return float
     */
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    /**
     * @return string
     */
    public function getMainType(): string
    {
        return $this->mainType;
    }

    /**
     * @return float
     */
    public function getTemperatureFeels(): float
    {
        return $this->temperatureFeels;
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->pressure;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }
}
