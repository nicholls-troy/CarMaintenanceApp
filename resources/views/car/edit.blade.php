@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        {{ $car->make }} Edit Page
    </h1>
@endsection

@section('content')
<div class="card-body border rounded">
    <form action="{{ route('car.update', $car) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" value="{{ $car->model }}">
            <label for="year">Year</label>
            <input type="text" class="form-control" name="year" value="{{ $car->year }}">
            <label for="colour">Colour</label>
            <input type="text" class="form-control" name="colour" value="{{ $car->colour }}">
        </div>
        <br>
        <div class="form-group mb-3">
            <button class="btn btn-lg btn-success" onclick="return confirm('Are you sure you want to edit the {{$car->make}}?')">Edit Car</button>
            <a class="btn btn-lg btn-danger btn-md ml-2" href="{{ route('car.destroy', $car)}}" onclick="return confirm('Are you sure you want to delete {{$car->make}}?');">Delete</a>
        </div>
    </form>
</div><br>
<a class="btn btn-lg btn-info text-light float-right" href="/">Back</a>
@endsection