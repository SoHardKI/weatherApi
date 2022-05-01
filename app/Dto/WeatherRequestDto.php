<?php

namespace App\Dto;

class WeatherRequestDto
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $format;

    public function __construct(string $city, string $format)
    {
        $this->city = $city;
        $this->format = $format;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getFormat(): string
    {
        return $this->format;
    }
}
