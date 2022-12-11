@extends('welcome')

@section('content')
    <div class="text-white space-y-3">
        <p>Full Name: {{ $employee->name }}</p>
        <p>Average Pay Per Hour: {{ $employee->avg_pay_per_hour }}</p>
        <p>Average Total Pay: {{ $employee->avg_total_pay }}</p>
        <p><a class="py-2 px-4 bg-green-900 text-white rounded-md" href="{{ route('employees.shifts', $employee) }}">
                View all shifts
            </a></p>
    </div>

    <div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Payments</h1>
                    <p class="mt-2 text-sm text-white">A list of last 5 completed payments</p>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Hours</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Rate per hour</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Shift Type</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Taxable</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Paid at</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total Pay</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($employee->lastFivePayments() as $payment)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $payment->date }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->hours }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">£{{ $payment->rate_per_hour }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->shift_type }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->taxable ? 'Yes' : 'No' }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $payment->paid_at }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">£{{ $payment->total_pay }}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7" class="text-black text-center p-2">
                                            No payments were found for this employee.
                                        </td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
