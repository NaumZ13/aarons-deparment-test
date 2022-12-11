<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ShiftRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'employee_id'   => ['required', Rule::exists('employees', 'id')],
            'shift_type'    => ['required'],
            'status'        => ['required'],
            'taxable'       => ['required', 'boolean'],
            'hours'         => ['required', 'integer'],
            'rate_per_hour' => ['required'],
            'date'          => ['required', 'date'],
            'paid_at'       => ['nullable', 'date'],
        ];
    }
}
