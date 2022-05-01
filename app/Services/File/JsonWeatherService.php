<?php

namespace App\Services\File;

use App\Contracts\FileWeather;
use App\Dto\WeatherApiResponseDto;

class JsonWeatherService extends FileWeather
{
    protected function createContent(WeatherApiResponseDto $apiResponseDto): string
    {
        $resultArray = [];
        $resultArray['temperature'] = $apiResponseDto->getTemperature();
        $resultArray['wind_direction'] = $apiResponseDto->getWindDirection();
        $resultArray['main'] = $apiResponseDto->getMainType();
        $resultArray['pressure'] = $apiResponseDto->getPressure();
        $resultArray['wind_speed'] = $apiResponseDto->getWindSpeed();
        $resultArray['feels_like'] = $apiResponseDto->getTemperatureFeels();

        return json_encode($resultArray);
    }

    protected function getType(): string
    {
        return '.json';
    }
}
