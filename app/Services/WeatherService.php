<?php

namespace App\Services;

use App\Contracts\WeatherApi;
use App\Dto\WeatherApiResponseDto;
use App\Dto\WeatherRequestDto;
use App\Factories\FileFactory;

class WeatherService
{
    /**
     * @var WeatherApi
     */
    private $apiService;


    public function __construct(WeatherApi $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getWeatherFilename(WeatherRequestDto $requestDto): string
    {
        $weatherDto = $this->apiService->getWeather($requestDto->getCity());

        return FileFactory::make($requestDto->getFormat())->getFilePath($weatherDto);
    }
}
