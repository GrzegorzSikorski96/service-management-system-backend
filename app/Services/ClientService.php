<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Support\Collection;
use Sms\Models\Client;

/**
 * Class ClientService
 * @package Sms\Services
 */
class ClientService extends BaseService
{
    /**
     * @param array $request
     * @return Client
     */
    public function create(array $request): Client
    {
        $client = new Client($request);
        $client->save();

        if (!array_key_exists('agency_id', $request)) {
            $request['agency_id'] = auth()->user()->agency->id;
        }

        $agency = $this->agencyService->agency($request['agency_id']);
        $agency->clients()->attach($client);
        $agency->save();

        return $client;
    }

    /**
     * @param int $clientId
     * @return Client
     */
    public function client(int $clientId): Client
    {
        if ($this->currentUser()->isAdmin()) {
            return Client::findOrFail($clientId);
        }
        return $this->currentUser()->agency->clients()->with('tickets.ticketStatus')->findOrFail($clientId);
    }

    /**
     * @return Collection
     */
    public function clients(): Collection
    {
        if ($this->currentUser()->isAdmin()) {
            return Client::all();
        }

        return $this->currentUser()->agency->clients;
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
     * @return bool
     */
    public function remove(int $clientId): bool
    {
        if (auth()->user()->isAdmin()) {
            $client = Client::findOrFail($clientId);
        } else {
            $client = auth()->user()->agency->clients()->findOrFail($clientId);
        }

        $client->delete();

        return true;
    }

    /**
     * @param array $data
     * @return Client
     */
    public function addByNumber(array $data): Client
    {
        $client = Client::where('NIP', $data['number'])->firstOrFail();

        $agency = $this->agencyService->agency($data['agency_id']);
        $agency->clients()->syncWithoutDetaching($client);
        $agency->tickets()->syncWithoutDetaching($client->tickets);

        foreach ($client->tickets as $ticket) {
            $agency->devices()->syncWithoutDetaching($ticket->device);
        }

        $agency->save();

        return $client;
    }
}
