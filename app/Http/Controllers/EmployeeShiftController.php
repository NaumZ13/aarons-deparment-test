<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeShiftController extends Controller
{
    public function index(Employee $employee)
    {
        $employee->loadMissing('shifts');

        $shifts = $employee->shifts()->get();

        return view('employees.shifts.index', compact('employee', 'shifts'));
    }
}
