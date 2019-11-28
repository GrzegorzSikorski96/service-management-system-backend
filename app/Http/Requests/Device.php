<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Device
 * @package Sms\Http\Requests
 */
class Device extends ApiRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
            'description' => 'string|nullable|max:100',
            'serial_number' => 'required|string|max:255',
        ];
    }
}
