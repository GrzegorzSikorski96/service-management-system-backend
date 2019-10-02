<?php

declare(strict_types=1);

namespace Sms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Note
 * @package Sms\Models
 * @property int $id
 * @property string $content
 * @property int $author_id
 * @property int $ticket_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Note extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
