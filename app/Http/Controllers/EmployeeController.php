<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('employer')->paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function show(Employee $employee)
    {
        $employee->loadMissing('shifts');

        return view('employees.show', compact('employee'));
    }
}
