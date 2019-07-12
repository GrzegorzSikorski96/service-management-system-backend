<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Ticket
 * @package Sms\Models
 * @property int $id
 * @property string $description
 * @property string $note
 * @property string $message
 * @property int $client_id
 * @property int $ticket_status_id
 * @property int $device_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Ticket extends Model
{
    /**
     * @var string
     */
    protected $table = 'tickets';

    /**
     * @return HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(TicketStatus::class);
    }

    /**
     * @return BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * @return BelongsToMany
     */
    public function agencies(): BelongsToMany
    {
        return $this->belongsToMany(Agency::class, 'agency_tickets');
    }
}
