<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkpoint extends Model
{
    
    protected $fillable = [
        'employee_id',
        'checkpoint',
    ];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

}
