<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\MailType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $priority
 * @property string $color
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingMail> $incomingMails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingMail> $outgoingMails
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|MailType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailType active()
 * @method static \Database\Factories\MailTypeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class MailType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'priority',
        'color',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the incoming mails with this type.
     */
    public function incomingMails(): HasMany
    {
        return $this->hasMany(IncomingMail::class, 'type_id');
    }

    /**
     * Get the outgoing mails with this type.
     */
    public function outgoingMails(): HasMany
    {
        return $this->hasMany(OutgoingMail::class, 'type_id');
    }

    /**
     * Scope a query to only include active types.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}