<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\Client;

/**
 * Class ClientService
 * @package Sms\Services
 */
class ClientService
{
    /**
     * @param array $request
     * @return Client
     */
    public function create(array $request): Client
    {
        $ticket = new Client($request);
        $ticket->save();

        return $ticket;
    }

    /**
     * @param int $clientId
     * @return Client
     */
    public function client(int $clientId): Client
    {
        return Client::findOrFail($clientId);
    }

    /**
     * @return Collection
     */
    public function clients(): Collection
    {
        return Client::all();
    }

    /**
     * @param array $data
     * @param int $clientId
     * @return Client
     */
    public function edit(array $data, int $clientId): Client
    {
        $client = $this->client($clientId);
        $client->fill($data);
        $client->save();

        return $client;
    }

    /**
     * @param int $clientId
     */
    public function remove(int $clientId): void
    {
        $ticket = Client::findOrFail($clientId);
        $ticket->delete();
    }
}
