<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Employee;
use App\Http\Requests\ShiftRequest;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::query()
            ->filter(request(['search']))
            ->paginate(10)
            ->withQueryString();

        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        $employees = Employee::query()->get();
        return view('shifts.create', compact('employees'));
    }

    public function store(ShiftRequest $request)
    {
        $shift = Shift::query()->create($request->all());
        return redirect()->route('shifts.edit', $shift)->with(['success' => "Shift was successfully created."]);
    }

    public function edit(Shift $shift)
    {
        $employees = Employee::query()->get();
        return view('shifts.edit', compact('shift', 'employees'));
    }

    public function update(ShiftRequest $request, Shift $shift)
    {
        $shift->update($request->all());
        return back()->with(['success' => "Shift was successfully updated."]);
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return back()->with(['success' => "Shift was successfully deleted."]);

    }
}
