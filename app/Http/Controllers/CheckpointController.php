<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class CheckpointController extends Controller
{
    
    public function show()
    {
        return Inertia::render(
            'CheckPoint'
        );
    }


}
