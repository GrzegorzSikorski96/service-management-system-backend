<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Agency
 * @package Sms\Http\Requests
 */
class Agency extends ApiRequest
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
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string',
        ];
    }
}
