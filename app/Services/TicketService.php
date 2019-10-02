<?php

declare(strict_types=1);

namespace Sms\Services;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Sms\Models\Ticket;

/**
 * Class TicketService
 * @package Sms\Services
 */
class TicketService
{
    /**
     * @param int $id
     * @return Ticket
     */
    public function findTicket(int $id): Ticket
    {
        return Ticket::findOrFail($id);
    }

    /**
     * @param array $request
     * @return Ticket
     */
    public function create(array $request): Ticket
    {
        $ticket = new Ticket();

        $ticket->fill($request);
        $ticket->token = Str::random(15);

        $ticket->save();

        return $ticket;
    }

    /**
     * @param int $id
     * @return Ticket
     * @throws ModelNotFoundException
     */
    public function ticket(int $id): Ticket
    {
        return Ticket::findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function tickets(): Collection
    {
        return Ticket::all();
    }

    /**
     * @param int $id
     * @throws Exception
     */
    public function remove(int $id): void
    {
        $ticket = $this->findTicket($id);
        $ticket->delete();
    }
}
