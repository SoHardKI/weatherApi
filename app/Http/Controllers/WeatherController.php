<?php

namespace App\Http\Controllers;

use App\Factories\FileFactory;
use App\Http\Requests\InputInfoRequest;
use App\Services\WeatherService;
use Exception;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class WeatherController extends Controller
{
    /**
     * @var WeatherService
     */
    private $weatherApiService;

    public function __construct(WeatherService $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

    /**
     * @throws Exception
     */
    public function getWeatherFile(InputInfoRequest $infoRequest): BinaryFileResponse
    {
        $fileName = $this->weatherApiService->getWeatherFilename($infoRequest->getDto());

        return response()->download(storage_path($fileName));
    }
}
