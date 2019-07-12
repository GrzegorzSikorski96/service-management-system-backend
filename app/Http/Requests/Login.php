<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Login
 * @package Sms\Http\Requests
 */
class Login extends ApiRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
