<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'document',
        'email',
        'password',
        'function',
        'born_date',
        'zipcode',
        'district',
        'city',
        'state',
        'adress',
        'number',
        'complement'
    ];


    protected $hidden = [
        'password'
    ];
}
