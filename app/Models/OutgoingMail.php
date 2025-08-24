<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\OutgoingMail
 *
 * @property int $id
 * @property string $mail_number
 * @property \Illuminate\Support\Carbon $mail_date
 * @property string $recipient
 * @property string $subject
 * @property string|null $content
 * @property int $category_id
 * @property int $type_id
 * @property string|null $attachment
 * @property string $status
 * @property int $created_by
 * @property int|null $approved_by
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MailCategory $category
 * @property-read \App\Models\MailType $type
 * @property-read \App\Models\Employee $creator
 * @property-read \App\Models\Employee|null $approver
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingMail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingMail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OutgoingMail query()
 * @method static \Database\Factories\OutgoingMailFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class OutgoingMail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'mail_number',
        'mail_date',
        'recipient',
        'subject',
        'content',
        'category_id',
        'type_id',
        'attachment',
        'status',
        'created_by',
        'approved_by',
        'sent_at',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mail_date' => 'date',
        'sent_at' => 'datetime',
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
     * Get the employee who created the mail.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }

    /**
     * Get the employee who approved the mail.
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'approved_by');
    }
}