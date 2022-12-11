<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    use HasFactory;

    const COMPLETE = 'Complete';
    const PENDING = 'Pending';
    const PROCESSING = 'Processing';
    const FAILED = 'Failed';

    const STATUSES = [
        self::COMPLETE,
        self::PENDING,
        self::PROCESSING,
        self::FAILED,
    ];

    const DAY = 'Day';
    const NIGHT = 'Night';
    const HOLIDAY = 'Holiday';

    const SHIFT_TYPES = [
        self::DAY,
        self::NIGHT,
        self::HOLIDAY,
    ];

    protected $fillable = [
        'employee_id',
        'shift_type',
        'status',
        'taxable',
        'hours',
        'rate_per_hour',
        'paid_at',
        'date',
        'total_pay',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function scopeComplete(Builder $query): Builder
    {
        return $query->where('status', '=', self::COMPLETE)
            ->whereNotNull('paid_at');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('total_pay', '>', $search);
        });
    }
}
