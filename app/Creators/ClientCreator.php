<?php

declare(strict_types=1);

namespace Sms\Creators;

use Sms\Models\Client;

/**
 * Class ClientCreator
 * @package Sms\Creators
 */
class ClientCreator
{
    /**
     * @param int $id
     * @return void
     */
    public function createOrReplaceClient(int $id): void
    {
        $client = Client::withTrashed()->firstOrCreate(
            ['id' => $id],
            [
                'name' => 'testName',
                'email' => 'test@example.com',
                'phone_number' => '000-000-000',
                'description' => 'Testowy opis',
                'address' => 'Adres klienta',
            ]
        );

        $client->deleted_at = null;

        $client->save();
    }

    /**
     * @param int $id
     * @return void
     */
    public function removeClientIfExists(int $id): void
    {
        Client::where('id', $id)->delete();
    }
}
