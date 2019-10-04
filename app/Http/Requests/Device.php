<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Client
 * @package Sms\Http\Requests
 */
class Device extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name' => 'required|string|min:3|max:100',
            'description' => 'string|min:3|max:100',
            'serial_number' => 'required|string|max:255',
        ];
    }
}
