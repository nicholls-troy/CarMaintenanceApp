<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Maintenance;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('maintenances')->get();

        if(!$cars->count()) {
            return redirect()->route('car.create');
        } else {
            return view('car.index', compact('cars'));
        }
    }

    public function create()
    {
        return view('car.create');
    }

    public function store()
    {
        $rules = [
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'colour' => 'required'
        ];

        $this->validate(request(), $rules);

        $car = Car::create([
            'make' => request('make'),
            'model' => request('model'),
            'year' => request('year'),
            'colour' => request('colour'),
        ]);

        return redirect()->route('car.index');
    }

    public function edit($id)
    {
        $car = Car::with('maintenances')->find($id);

        return view('car.edit', compact('car'));
    }

    public function update($id)
    {
        $car = Car::with('maintenances')->find($id);

        $car->model = request('model');
        $car->year = request('year');
        $car->colour = request('colour');
        $car->save();
        
        return redirect()->route('car.index');
    }

    public function destroy($id)
    {

        $car = Car::find($id);

        if(!$car) {
            dd('That car does not exist');
        }

        $car->delete();

        return redirect()->route('car.index');
    }
}
