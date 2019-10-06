<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Service
 * @package Sms\Http\Requests
 */
class Service extends ApiRequest
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
            'description' => 'required|string|min:3|max:100',
            'address' => 'required|string|max:255',
            'owner_id' => 'required|integer',
        ];
    }
}
