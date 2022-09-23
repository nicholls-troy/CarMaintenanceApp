<?php

namespace App\Imports;

use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaintenanceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Maintenance([
            'oil changes' => $row['oil_changes'],
            'tire rotations' => $row['tire_rotations'],
            'tune-ups' => $row['tune_ups'],
            'repairs' => $row['repairs'],
        ]);
    }
}
