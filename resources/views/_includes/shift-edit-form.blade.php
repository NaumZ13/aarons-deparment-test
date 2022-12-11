<form method="POST" action="{{ route('shifts.update', $shift) }}" class="space-y-8 divide-gray-200">
    @method('PUT')
    @csrf
    <div class="space-y-8 divide-y divide-gray-200">
        <div>
            <div>
                <h3 class="text-lg font-medium leading-6 text-white">Update Shift</h3>
            </div>
        </div>

        <div class="pt-8">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="employee_id" class="block text-sm font-medium text-white">Employee</label>
                    <div class="mt-1">
                        <select id="employee_id" name="employee_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach($employees as $employee)
                                <option selected="{{ $shift->employee_id }}" value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="status" class="block text-sm font-medium text-white">Shift Type</label>
                    <div class="mt-1">
                        <select id="status" name="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach(\App\Models\Shift::STATUSES as $status)
                                <option selected="{{ $shift->status }}" value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="shift_type" class="block text-sm font-medium text-white">Shift Type</label>
                    <div class="mt-1">
                        <select id="shift_type" name="shift_type" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach(\App\Models\Shift::SHIFT_TYPES as $shift_type)
                                <option selected="{{ $shift->shift_type }}" value="{{ $shift_type }}">{{ $shift_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="status" class="block text-sm font-medium text-white">Taxable</label>
                    <div class="mt-1">
                        <select id="taxable" name="taxable" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option {{ $shift->taxable ? 'selected' : '' }} value="1">Yes</option>
                            <option {{ ! $shift->taxable ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="hours" class="block text-sm font-medium text-white">Hours</label>
                    <div class="mt-1">
                        <input name="hours" id="hours" type="number" value="{{ $shift->hours }}" autocomplete="family-name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="rate_per_hour" class="block text-sm font-medium text-white">Rate per hour</label>
                    <div class="mt-1">
                        <input name="rate_per_hour" id="rate_per_hour" type="number" value="{{ $shift->rate_per_hour }}" step="0.01" autocomplete="family-name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="date" class="block text-sm font-medium text-white">Date</label>
                    <div class="mt-1">
                        <input name="date" id="date" type="date" value="{{ $shift->date }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="paid_at" class="block text-sm font-medium text-white">Paid at</label>
                    <div class="mt-1">
                        <input name="paid_at" id="paid_at" type="date" value="{{ Carbon\Carbon::parse($shift->paid_at)->format('Y-m-d') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pt-5">
        <div class="flex justify-end">
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
        </div>
    </div>
</form>
