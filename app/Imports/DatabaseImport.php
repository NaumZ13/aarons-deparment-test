<?php

namespace App\Imports;

use App\Models\Employer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class DatabaseImport implements ToCollection, WithStartRow, WithBatchInserts, WithChunkReading
{

    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            $employer = Employer::updateOrCreate([
                'name' => $row[2],
            ], [
                'name' => $row[2],
            ]);

            $employee = $employer->employees()->updateOrCreate([
                'name' => $row[1],
            ], [
                'name' => $row[1],
            ]);

            $employee->shifts()->updateOrCreate([
                'hours'         => $row[3],
                'rate_per_hour' => (float)str_replace('£', '', $row[4]),
                'taxable'       => $row[5] == 'Yes' ? true : false,
                'status'        => $row[6],
                'shift_type'    => $row[7],
                'paid_at'       => $row[8],
                'date'          => $row[0],
                'total_pay'     => (float)str_replace('£', '', $row[4]) * $row[3],
            ], [
                'hours'         => $row[3],
                'rate_per_hour' => (float)str_replace('£', '', $row[4]),
                'taxable'       => $row[5] == 'Yes' ? true : false,
                'status'        => $row[6],
                'shift_type'    => $row[7],
                'paid_at'       => $row[8],
                'date'          => $row[0],
                'total_pay'     => (float)str_replace('£', '', $row[4]) * $row[3],
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
