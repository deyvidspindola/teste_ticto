<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Http\Services\ListCheckPointService;

class DashboardController extends Controller
{
    
    protected $listCheckPointService;

    public function __construct(ListCheckPointService $listCheckPointService)
    {
        $this->listCheckPointService = $listCheckPointService;
    }

    public function show()
    {
        $checkpoints = $this->listCheckPointService->execute();
        return Inertia::render('Dashboard', [
            'checkpoints' => $checkpoints
        ]);
    }

}
