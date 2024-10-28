<?php

namespace App\Http\Services;

use App\Models\Checkpoint;

class DoCheckPointService
{

    protected $checkpointModel;

    public function __construct(Checkpoint $checkpoint)
    {
        $this->checkpointModel = $checkpoint;
    }

    public function execute()
    {

        $this->checkpointModel->create([
            'employee_id' => auth()->user()->employee->id,
            'checkpoint' => now()->format('Y-m-d H:i:s'),
        ]);
    }

}