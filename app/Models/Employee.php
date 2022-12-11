<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'name',
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function shifts(): HasMany
    {
        return $this->hasMany(Shift::class);
    }

    public function getEmployerNameAttribute()
    {
        return $this->employer->name;
    }

    public function getAvgPayPerHourAttribute(): string
    {
        return '£' . round($this->shifts()->complete()->avg('rate_per_hour'), 2);
    }

    public function getAvgTotalPayAttribute(): string
    {
        return '£' . round($this->shifts()->complete()->avg('total_pay'), 2);
    }

    public function lastFivePayments(): Collection
    {
        return $this->shifts()
            ->complete()
            ->orderByDesc('date')
            ->get();
    }
}
