<?php

declare(strict_types=1);

namespace Sms\Services;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Sms\Models\Client;

/**
 * Class TicketService
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
     * @param int $id
     * @return Client
     * @throws ModelNotFoundException
     */
    public function client(int $id): Client
    {
        return Client::findOrFail($id);
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
     * @param int $id
     * @return Client
     */
    public function edit(array $data, int $id): Client
    {
        $client = $this->client($id);
        $client->fill($data);
        $client->save();

        return $client;
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function remove(int $id): void
    {
        $ticket = Client::findOrFail($id);
        $ticket->delete();
    }
}
