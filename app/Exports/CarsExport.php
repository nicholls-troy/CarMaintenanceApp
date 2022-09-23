<?php

namespace App\Exports;

use App\Models\Car;
use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
// use PhpOffice\PhpSpreadsheet\Cell\DataType;

class CarsExport implements FromCollection, WithTitle, WithHeadings, WithMapping
{
    public function collection()
    {
        return Car::with('maintenances')->get();
    }

    public function title(): string
    {
        return 'Cars List';
    }

    public function headings(): array
    {
        return [
            'Make',
            'Model',
            'Year',
            'Colour',
            'Oil Change',
            'Tire Rotation',
            'Tune-Up',
            'Repair',
            'Price',
            'Notes',
            'Date and Time Completed'
        ];
    }

    public function map($row): array 
    {
        $tmp = [];
        foreach($row->maintenances->sortBy('date_completed') as $maintenance) {
            $tmp[] = [
                $row->make,
                $row->model,
                $row->year,
                $row->colour,
                $maintenance->oil_changes ? 'Yes' : 'No',
                $maintenance->tire_rotations ? 'Yes' : 'No',
                $maintenance->tune_ups ? 'Yes' : 'No',
                $maintenance->repairs ? 'Yes' : 'No',
                $maintenance->price,
                $maintenance->notes,
                $maintenance->date_completed
            ];
        }
        return $tmp;
    }
}
