<?php

namespace App\Services\File;

use App\Contracts\FileWeather;
use App\Dto\WeatherApiResponseDto;

class XmlWeatherService extends FileWeather
{
    protected function createContent(WeatherApiResponseDto $apiResponseDto): string
    {
        $xw = xmlwriter_open_memory();
        xmlwriter_set_indent($xw, 1);
        $res = xmlwriter_set_indent_string($xw, ' ');

        xmlwriter_start_document($xw, '1.0', 'UTF-8');

        xmlwriter_start_element($xw, 'weather');

        xmlwriter_start_element($xw, 'Wind_speed');
        xmlwriter_text($xw, $apiResponseDto->getWindSpeed());
        xmlwriter_end_element($xw);

        xmlwriter_start_element($xw, 'Temperature');
        xmlwriter_text($xw, $apiResponseDto->getTemperature());
        xmlwriter_end_element($xw);

        xmlwriter_start_element($xw, 'Main');
        xmlwriter_text($xw, $apiResponseDto->getMainType());
        xmlwriter_end_element($xw);

        xmlwriter_start_element($xw, 'Feels_like');
        xmlwriter_text($xw, $apiResponseDto->getTemperatureFeels());
        xmlwriter_end_element($xw);

        xmlwriter_start_element($xw, 'Wind_direction');
        xmlwriter_text($xw, $apiResponseDto->getWindDirection());
        xmlwriter_end_element($xw);

        xmlwriter_start_element($xw, 'Pressure');
        xmlwriter_text($xw, $apiResponseDto->getPressure());
        xmlwriter_end_element($xw);

        xmlwriter_end_element($xw);

        xmlwriter_end_document($xw);

        return xmlwriter_output_memory($xw);
    }

    protected function getType(): string
    {
        return '.xml';
    }
}
