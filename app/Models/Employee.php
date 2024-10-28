<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'manager_id',
        'name',
        'document',
        'email',
        'role',
        'born_date',
        'zipcode',
        'district',
        'city',
        'state',
        'address',
        'number',
        'complement'
    ];


    protected $hidden = [
        'password'
    ];


    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function checkpoint(): HasMany
    {
        return $this->hasMany(Checkpoint::class, 'employee_id');
    }


}
