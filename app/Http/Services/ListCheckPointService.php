<?php

namespace App\Http\Services;

use App\Models\Checkpoint;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class ListCheckPointService
{

    protected $checkpointModel;

    public function __construct(Checkpoint $checkpoint)
    {
        $this->checkpointModel = $checkpoint;
    }

    public function execute($start_date = null, $end_date = null)
    {
        $checkpoints = DB::table('checkpoints')
                            ->join('employees', function(JoinClause $join) {
                                $join->on('checkpoints.employee_id', '=', 'employees.id');
                            })
                            ->join('users', function(JoinClause $join) {
                                $join->on('employees.manager_id', '=', 'users.id');
                            })
                            ->select(
                           'checkpoints.id',
                                    'checkpoints.checkpoint',
                                    'employees.name', 
                                    'employees.role', 
                                    DB::raw("TIMESTAMPDIFF(YEAR, born_date, CURDATE()) AS age"), 
                                    'users.name as manager'
                            );

        if (auth()->user()->role == 'employee') {
            $employee_id = auth()->user()->employee->id;
            $checkpoints = $checkpoints->where('employee_id', $employee_id);
        } else {
            $manager_id = auth()->user()->id;
            $checkpoints = $checkpoints->where('employees.manager_id', $manager_id);
        }
        

        if(!is_null($start_date)){
            $checkpoints = $checkpoints->whereDate('checkpoints.created_at', '>=', $start_date);
        }

        if(!is_null($end_date)){
            $checkpoints = $checkpoints->whereDate('checkpoints.created_at', '<=', $end_date);
        }

        $checkpoints = $checkpoints->orderBy('checkpoints.created_at', 'desc')
                                   ->get();

        return $checkpoints;
    }

}