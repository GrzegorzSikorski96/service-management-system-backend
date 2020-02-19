<?php

declare(strict_types=1);

namespace Sms\Creators;

use Illuminate\Support\Str;
use Sms\Models\Ticket;

/**
 * Class TicketCreator
 * @package Sms\Creators
 */
class TicketCreator
{
    /**
     * @param int $id
     * @param int $clientId
     * @param int $deviceId
     * @return void
     */
    public function createOrReplaceTicket(int $id, int $clientId = 1, int $deviceId = 1): void
    {
        $user = Ticket::withTrashed()->firstOrCreate(
            ['id' => $id],
            [
                'description' => 'ticket description',
                'additional_information' => 'ticket additional information',
                'message' => 'ticket message',
                'token' => Str::random(15),
                'client_id' => $clientId,
                'device_id' => $deviceId,
            ]
        );

        $user->deleted_at = null;

        $user->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function removeTicketIfExists(int $id): void
    {
        Ticket::where('id', $id)->delete();
    }
}
