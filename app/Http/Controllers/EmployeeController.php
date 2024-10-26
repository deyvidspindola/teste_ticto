<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function show()
    {
        return Inertia::render('Employee/List');
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        dd($request);
    }

}
