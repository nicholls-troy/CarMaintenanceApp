@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        Car Creation Form
    </h1>
@endsection

@section('content')
    <div class="card-body border rounded">
        <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="make">Make: </label>
                <input type="text" class="form-control" name="make" id="make" placeholder="Honda, Tesla, Ford, etc.">
                <label for="model">Model: </label>
                <input type="text" class="form-control" name="model" id="model" placeholder="Civic, S, Mustang, etc.">
                <label for="year">Year: </label>
                <input type="text" class="form-control" name="year" id="year">
                <label for="colour">Colour: </label>
                <input type="text" class="form-control" name="colour" id="colour">
            </div>
            <br>
            <button class="btn btn-success">Create Car</button>
        </form>
    </div><br>
    <a class="btn btn-lg btn-info text-light float-right" href="/">Back</a>
@endsection