<?php

declare(strict_types=1);

namespace BehatTests\helpers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Sms\Creators\ClientCreator;
use Sms\Models\Client;

/**
 * Trait Clients
 * @package BehatTests\helpers
 */
trait Clients
{
    /**
     * @Given client with id :id exist
     * @param int $clientId
     * @throws BindingResolutionException
     */
    public function clientWithIdExist(int $clientId): void
    {
        $creator = app()->make(ClientCreator::class);
        $creator->createOrReplaceClient($clientId);
    }

    /**
     * @Given client with id :id has NIP :NIP
     */
    public function clientWithIdHasNIP(int $id, string $NIP): void
    {
        $client = Client::findOrFail($id);
        $client->NIP = $NIP;

        $client->save();
    }
}
