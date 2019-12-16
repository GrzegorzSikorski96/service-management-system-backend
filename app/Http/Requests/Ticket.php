<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

class Ticket extends ApiRequest
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
            'additional_information' => 'string|max:150',
            'message' => 'max:255',
            'description' => 'string|min:3|max:100',
            'client_id' => 'required|integer',
            'device_id' => 'required|integer',
        ];
    }
}
