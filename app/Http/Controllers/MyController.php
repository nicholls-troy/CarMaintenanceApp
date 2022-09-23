<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CarsExport;
// use App\Imports\MaintenanceImport;
// use App\Imports\CarImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Car;
use App\Models\Maintenance;

class MyController extends Controller
{
    public function importExportView()
    {
        return view('import');
    }

    public function export() 
    {
        return Excel::download(new CarsExport, 'cars.xlsx');
    }

    public function import()
    {
        Excel::import(new MaintenanceImport, request()->file('file'));

        return back();
    }
}
