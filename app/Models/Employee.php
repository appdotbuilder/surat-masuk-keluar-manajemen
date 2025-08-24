<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property string $nip
 * @property string $email
 * @property string|null $phone
 * @property int $department_id
 * @property int $position_id
 * @property string $status
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $hire_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \App\Models\Position $position
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomingMail> $receivedMails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OutgoingMail> $createdMails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $dispositionsFrom
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disposition> $dispositionsTo
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee active()
 * @method static \Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'nip',
        'email',
        'phone',
        'department_id',
        'position_id',
        'status',
        'address',
        'birth_date',
        'gender',
        'hire_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
    ];

    /**
     * Get the department that the employee belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the position of the employee.
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Get the incoming mails received by this employee.
     */
    public function receivedMails(): HasMany
    {
        return $this->hasMany(IncomingMail::class, 'received_by');
    }

    /**
     * Get the outgoing mails created by this employee.
     */
    public function createdMails(): HasMany
    {
        return $this->hasMany(OutgoingMail::class, 'created_by');
    }

    /**
     * Get dispositions sent from this employee.
     */
    public function dispositionsFrom(): HasMany
    {
        return $this->hasMany(Disposition::class, 'from_employee_id');
    }

    /**
     * Get dispositions sent to this employee.
     */
    public function dispositionsTo(): HasMany
    {
        return $this->hasMany(Disposition::class, 'to_employee_id');
    }

    /**
     * Scope a query to only include active employees.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}