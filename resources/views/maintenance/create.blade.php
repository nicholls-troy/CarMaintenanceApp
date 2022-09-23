@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        Maintenance Request Form
    </h1>
@endsection

@section('content')
    <div class="card-body border rounded">
        <form action="{{ route('maintenance.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="form-group">    
                <div class="col-sm-8">
                    <label class="col-sm-4 col-form-label" id="useCar">Use Selected Car</label>
                    <select class="form-control" id="selectCar" name="car_selected" required focus>
                        <option value="" disabled selected>Please select car</option>        
                        @foreach($cars as $car)
                            <option value="{{$car->id}}">{{ $car->make }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Maintenance Work: </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="oil_changes" id="gridChecks1">
                            <label class="form-check-label" for="gridChecks1">Oil Changes</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tire_rotations" id="gridChecks2">
                            <label class="form-check-label" for="gridChecks2">Tire Rotations</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tune_ups" id="gridChecks3">
                            <label class="form-check-label" for="gridChecks3">Tune-ups</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="repairs" id="gridChecks4">
                            <label class="form-check-label" for="gridChecks4">Repairs</label>  
                            </div>
                        </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="price">Price: </label>
                <input type="text" class="form-control" name="price" id="price">
                <label for="maintenanceNotes">Maintenance Notes</label>
                <textarea class="form-control" name="notes" id="maintenanceNotes" rows="3"></textarea>
            </div>
            <br>
            <button class="btn btn-success">Maintenance Request</button>
        </form>
    </div><br>
    <a class="btn btn-lg btn-info text-light float-right" href="/">Back</a>
@endsection