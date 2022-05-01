<?php

namespace App\Contracts;

use App\Dto\WeatherApiResponseDto;

interface WeatherApi
{
    public const FAHRENHEIT = 273.15;
    public function getWeather(string $cityName) : WeatherApiResponseDto;
}
