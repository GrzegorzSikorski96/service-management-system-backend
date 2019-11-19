<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Sms\Models\AgencyRole;
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
        return Client::with(['tickets.ticketStatus'])->findOrFail($clientId);
    }

    /**
     * @return Collection
     */
    public function clients(): Collection
    {
        $user = Auth::user();

        if ($user->role->id == AgencyRole::ADMINISTRATOR) {
            return Client::all();
        }

        return $user->agency->clients;
    }

    /**
     * @param array $data
     * @return Client
     */
    public function edit(array $data): Client
    {
        $client = $this->client($data['id']);
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

    /**
     * @param array $data
     * @return Client
     */
    public function addByNumber(array $data): Client
    {
        $agency = Auth::user()->agency;

        $client = Client::where('NIP', $data['number'])->firstOrFail();

        $agency->clients()->syncWithoutDetaching($client);
        $agency->tickets()->syncWithoutDetaching($client->tickets);

        $agency->save();

        return $client;
    }
}
