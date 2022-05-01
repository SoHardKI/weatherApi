<?php

namespace App\Services\Api;

use App\Contracts\WeatherApi;
use App\Dto\WeatherApiResponseDto;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Openweathermap implements WeatherApi
{
    private const BASE_URL = 'https://api.openweathermap.org/data/2.5/weather';
    private const API_KEY = 'cb1eb2fa1541f53dfb13dc174f464547';

    /**
     * @throws GuzzleException
     */
    public function getWeather(string $cityName): WeatherApiResponseDto
    {
        $apiResponse = $this->getWeatherInfoByCityName($cityName);

        return $this->createAndFillDto($apiResponse);
    }

    private function createAndFillDto(string $response): WeatherApiResponseDto
    {
        $arrayData = json_decode($response, true);

        return new WeatherApiResponseDto(
            ($arrayData['main']['temp'] - self::FAHRENHEIT),
            $arrayData['wind']['deg'],
            $arrayData['wind']['speed'],
            $arrayData['weather'][0]['main'],
            ($arrayData['main']['feels_like'] - self::FAHRENHEIT),
            $arrayData['main']['pressure'],
            $arrayData['name']
        );
    }

    /**
     * @throws GuzzleException
     */
    private function getWeatherInfoByCityName(string $cityName): string
    {
        $url = self::BASE_URL.'?q='.$cityName.'&appid='.self::API_KEY;
        $client = new Client();

        return $client->get($url)->getBody()->getContents();
    }
}
