<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Services\DoCheckPointService;
use App\Http\Services\ListCheckPointService;

class CheckpointController extends Controller
{
    protected $doCheckPointService, $listCheckPointService; 
    

    public function __construct(DoCheckPointService $doCheckPointService, ListCheckPointService $listCheckPointService) {
        $this->doCheckPointService = $doCheckPointService;
        $this->listCheckPointService = $listCheckPointService;
    }


    public function show()
    {
        $checkpoints = $this->listCheckPointService->execute();
        return Inertia::render(
            'CheckPoint', [
                'checkpoints' => $checkpoints
            ]
        );
    }

    public function doCheckPoint(): RedirectResponse
    {
        $this->doCheckPointService->execute();
        return Redirect::route('checkpoint');
    }

    public function filter(Request $request)
    {
        $checkpoints = $this->listCheckPointService->execute($request->start_date, $request->end_date);
        return $checkpoints;
    }


}
