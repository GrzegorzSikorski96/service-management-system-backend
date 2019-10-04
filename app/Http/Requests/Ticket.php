<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

class Ticket extends ApiRequest
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
            'note' => 'string|max:150',
            'message' => 'string|max:255',
            'description' => 'string|min:3|max:100',
            'client_id' => 'required|integer',
            'ticket_status_id' => 'required|integer',
            'device_id' => 'required|integer',
        ];
    }
}
