<?php

declare(strict_types=1);

namespace Sms\Http\Requests;

/**
 * Class Note
 * @package Sms\Http\Requests
 */
class Note extends ApiRequest
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
            'content' => 'required|string|max:200',
            'author_id' => 'required|integer',
            'ticket_id' => 'required|integer',
        ];
    }
}
