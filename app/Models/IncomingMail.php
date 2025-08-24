<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IncomingMail
 *
 * @property int $id
 * @property string $mail_number
 * @property string|null $sender_number
 * @property \Illuminate\Support\Carbon $mail_date
 * @property \Illuminate\Support\Carbon $received_date
 * @property string $sender
 * @property string $subject
 * @property string|null $content
 * @property int $category_id
 * @property int $type_id
 * @property string|null $attachment
 * @property string $status
 * @property int $received_by
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MailCategory $category
 * @property-read \App\Models\MailType $type
 * @property-read \App\Models\Employee $receivedByEmployee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $dispositions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingMail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingMail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomingMail query()
 * @method static \Database\Factories\IncomingMailFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class IncomingMail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'mail_number',
        'sender_number',
        'mail_date',
        'received_date',
        'sender',
        'subject',
        'content',
        'category_id',
        'type_id',
        'attachment',
        'status',
        'received_by',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mail_date' => 'date',
        'received_date' => 'date',
    ];

    /**
     * Get the category of the mail.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(MailCategory::class);
    }

    /**
     * Get the type of the mail.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(MailType::class);
    }

    /**
     * Get the employee who received the mail.
     */
    public function receivedByEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'received_by');
    }

    /**
     * Get the dispositions for this mail.
     */
    public function dispositions(): HasMany
    {
        return $this->hasMany(Disposition::class);
    }
}