<?php

namespace App\Http\Requests;

use App\Dto\WeatherRequestDto;
use App\Factories\FileFactory;
use Illuminate\Foundation\Http\FormRequest;

class InputInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'city' => 'required|string',
            'file_type' => 'required|string|in:'.implode(',', FileFactory::FILE_TYPES)
        ];
    }

    /**
     * @throws \Exception
     */
    public function getDto(): WeatherRequestDto
    {
        return new WeatherRequestDto(
            $this->get('city'),
            $this->get('file_type')
        );
    }
}
