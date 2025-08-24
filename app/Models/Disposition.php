<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Disposition
 *
 * @property int $id
 * @property int $incoming_mail_id
 * @property int $from_employee_id
 * @property int $to_employee_id
 * @property string $type
 * @property string $instruction
 * @property string|null $notes
 * @property string $priority
 * @property \Illuminate\Support\Carbon|null $due_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $received_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property string|null $response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\IncomingMail $incomingMail
 * @property-read \App\Models\Employee $fromEmployee
 * @property-read \App\Models\Employee $toEmployee
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disposition query()
 * @method static \Database\Factories\DispositionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Disposition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'incoming_mail_id',
        'from_employee_id',
        'to_employee_id',
        'type',
        'instruction',
        'notes',
        'priority',
        'due_date',
        'status',
        'received_at',
        'completed_at',
        'response',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'date',
        'received_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get the incoming mail that this disposition belongs to.
     */
    public function incomingMail(): BelongsTo
    {
        return $this->belongsTo(IncomingMail::class);
    }

    /**
     * Get the employee who sent the disposition.
     */
    public function fromEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'from_employee_id');
    }

    /**
     * Get the employee who received the disposition.
     */
    public function toEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'to_employee_id');
    }
}