<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

class User extends ApiRequest
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
            'surname' => 'required|string|min:3|max:100',
            'agency_role_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}
