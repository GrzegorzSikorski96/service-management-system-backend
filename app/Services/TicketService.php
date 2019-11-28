<?php

declare(strict_types=1);

namespace Sms\Services;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Sms\Models\Ticket;

/**
 * Class TicketService
 * @package Sms\Services
 */
class TicketService extends BaseService
{
    /**
     * @param array $request
     * @return Ticket
     */
    public function create(array $request): Ticket
    {
        $ticket = new Ticket($request);
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
        if ($this->currentUser()->isAdmin()) {
            return Ticket::with('client', 'device', 'ticketStatus')->findOrFail($id);
        }
        return $this->currentUser()->agency->tickets()->with('client', 'device', 'notes.author', 'ticketStatus')->findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function tickets(): Collection
    {
        if ($this->currentUser()->isAdmin()) {
            return Ticket::with(['client', 'device', 'ticketStatus'])->get();
        }

        return $this->currentUser()->agency->tickets()->with(['client', 'device', 'ticketStatus'])->get();
    }

    /**
     * @param array $data
     * @return Ticket
     */
    public function edit(array $data): Ticket
    {
        $ticket = $this->ticket($data['id']);

        $ticket->description = $data['description'];
        $ticket->message = $data['message'];
        $ticket->additional_information = $data['additional_information'];
        $ticket->ticket_status_id = $data['ticket_status_id'];

        $ticket->save();

        return $ticket;
    }

    /**
     * @param int $id
     * @throws ModelNotFoundException
     */
    public function remove(int $id): void
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
    }

    /**
     * @param int $ticketId
     * @return Collection
     */
    public function notes(int $ticketId): Collection
    {
        $ticket = $this->ticket($ticketId);

        return $ticket->notes()
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
