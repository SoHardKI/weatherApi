<?php

namespace App\Contracts;

use App\Dto\WeatherApiResponseDto;
use App\Jobs\DeleteFile;
use Illuminate\Support\Facades\File;

abstract class FileWeather
{
    public const DELETE_DELAY_SECONDS = 15;

    abstract protected function getType(): string;

    abstract protected function createContent(WeatherApiResponseDto $apiResponseDto): string;

    public function getFilePath(WeatherApiResponseDto $apiResponseDto): string
    {
        $filePath = $this->createFileName($apiResponseDto->getCityName());
        $content = $this->createContent($apiResponseDto);
        $this->createFile($filePath, $content);
        $this->deleteFile($filePath);

        return $filePath;
    }

    protected function createFileName(string $cityName): string
    {
        return time().'_'.$cityName.$this->getType();
    }

    protected function deleteFile(string $filePath): void
    {
        $job = (new DeleteFile($filePath))
            ->delay(self::DELETE_DELAY_SECONDS);
        dispatch($job);
    }

    protected function createFile(string $fileName, string $content): void
    {
        File::put(storage_path($fileName), $content);
    }
}
