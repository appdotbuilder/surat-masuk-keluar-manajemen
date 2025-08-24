<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrganizationSetting
 *
 * @property int $id
 * @property string $name
 * @property string|null $short_name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $logo
 * @property string|null $head_name
 * @property string|null $head_nip
 * @property string|null $head_position
 * @property array|null $mail_numbering_format
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrganizationSetting query()
 * @method static \Database\Factories\OrganizationSettingFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class OrganizationSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'short_name',
        'address',
        'phone',
        'email',
        'website',
        'logo',
        'head_name',
        'head_nip',
        'head_position',
        'mail_numbering_format',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mail_numbering_format' => 'array',
    ];
}