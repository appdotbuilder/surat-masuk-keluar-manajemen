<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\MailCategory
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property string $color
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingMail> $incomingMails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingMail> $outgoingMails
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|MailCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MailCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|MailCategory active()
 * @method static \Database\Factories\MailCategoryFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class MailCategory extends Model
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
     * Get the incoming mails with this category.
     */
    public function incomingMails(): HasMany
    {
        return $this->hasMany(IncomingMail::class, 'category_id');
    }

    /**
     * Get the outgoing mails with this category.
     */
    public function outgoingMails(): HasMany
    {
        return $this->hasMany(OutgoingMail::class, 'category_id');
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}