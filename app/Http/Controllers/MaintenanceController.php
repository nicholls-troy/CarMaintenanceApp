<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Car;

class MaintenanceController extends Controller
{
    public function index()
    {
        $cars = Car::with('maintenances')->get();

        return view('car.maintenance', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::with('maintenances')->where('id', $id)->first();

        return view('maintenance.view', compact('car'));
    }

    public function create()
    {
        $cars = Car::get();
        return view('maintenance.create', compact('cars'));
    }

    public function store()
    {
        $car_id = request('car_selected');
        $oil = strtoupper(request('oil_changes', 'off')) == 'ON';
        $tire = strtoupper(request('tire_rotations', 'off')) == 'ON';
        $tune = strtoupper(request('tune_ups', 'off')) == 'ON';
        $repair = strtoupper(request('repairs', 'off')) == 'ON';
        $price = request('price');
        $note = request('notes');

        Maintenance::create([
            'car_id' => $car_id,
            'oil_changes' => $oil,
            'tire_rotations' => $tire,
            'tune_ups' => $tune,
            'repairs' => $repair,
            'price' => $price,
            'notes' => $note
        ]);

        return redirect()->route('car.index');
    }

    public function edit($id)
    {
        $maintenance = Maintenance::find($id);

        return view('maintenance.edit', compact('maintenance'));
    }

    public function update($id)
    {
        $maintenance = Maintenance::find($id);

        $maintenance->oil_changes = strtoupper(request('oil_changes', 'off')) == 'ON';
        $maintenance->tire_rotations = strtoupper(request('tire_rotations', 'off')) == 'ON';
        $maintenance->tune_ups = strtoupper(request('tune_ups', 'off')) == 'ON';
        $maintenance->repairs = strtoupper(request('repairs', 'off')) == 'ON';
        $maintenance->price = request('price');
        $maintenance->notes = request('notes');

        $maintenance->save();
        
        return redirect()->route('car.index');
    }

    public function destroy($id)
    {

        $car = Maintenance::find($id);

        if(!$car) {
            dd('That maintenance does not exist');
        }

        $car->delete();

        return redirect()->route('car.index');
    }

}