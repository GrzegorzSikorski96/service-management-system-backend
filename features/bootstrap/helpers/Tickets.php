<?php

declare(strict_types=1);

namespace BehatTests\helpers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Sms\Creators\TicketCreator;

/**
 * Trait Tickets
 * @package BehatTests\helpers
 */
trait Tickets
{
    /**
     * @Given ticket with id :ticketId exist
     * @param int $ticketId
     * @throws BindingResolutionException
     */
    public function ticketWithIdExist(int $ticketId): void
    {
        $creator = app()->make(TicketCreator::class);
        $creator->createOrReplaceTicket($ticketId);
    }
}
