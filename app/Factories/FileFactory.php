<?php

namespace App\Factories;

use App\Contracts\FileWeather;
use App\Services\File\JsonWeatherService;
use App\Services\File\XmlWeatherService;
use RuntimeException;

class FileFactory
{
    public const TYPE_JSON = 'json';
    public const TYPE_XML = 'xml';

    public const FILE_TYPES = [
        self::TYPE_JSON,
        self::TYPE_XML
    ];

    public static function make(string $fileType): FileWeather
    {
        switch ($fileType) {
            case self::TYPE_JSON:
                return new JsonWeatherService();
            case self::TYPE_XML:
                return new XmlWeatherService();
            default:
                throw new RuntimeException('Format not supported');
        }
    }
}
