<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function show()
    {
        $emplyees = Employee::all();
        return Inertia::render('Employee/List', [
            'employees' => $emplyees
        ]);
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {

       Employee::create([
            'name' => $request->name,
            'document' => $request->document,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'born_date' => $request->born_date,
            'zipcode' => $request->zipcode,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'adress' => $request->adress,
            'number' => $request->number,
            'complement' => $request->complement,
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee'
        ]);

        return redirect(route('employees', absolute: false));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return Inertia::render('Employee/Edit', [
            'employee' => $employee
        ]);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $data = $request->except('password');
        $employee->update($data);
        
        return Redirect::route('employees'); 
    }

}
