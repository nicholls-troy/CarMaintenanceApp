@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        {{ $car->make }} Maintenance Done
    </h1>
@endsection

@section('content')
    @if ($car->maintenances->count() > 0)
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Oil Change</th>
                    <th scope="col">Tire Rotation</th>
                    <th scope="col">Tune-up</th>
                    <th scope="col">Repair</th>
                    <th scope="col">Price</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Date and Time Completed</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($car->maintenances->sortByDesc('date_completed') as $maintenance)
                <tbody>
                    <tr>
                        <td>{{ $car->make }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->colour }}</td>
                        <td>{{ $maintenance->oil_changes ? 'Yes' : 'No' }}</td>
                        <td>{{ $maintenance->tire_rotations ? 'Yes' : 'No' }}</td>
                        <td>{{ $maintenance->tune_ups ? 'Yes' : 'No' }}</td>
                        <td>{{ $maintenance->repairs ? 'Yes' : 'No' }}</td>
                        <td>${{ $maintenance->price }}</td>
                        <td>{{ $maintenance->notes }}</td>
                        <td>{{ $maintenance->date_completed->format('F d, Y \a\t H:i:s A') }}</td>
                        <td><a class="btn btn-warning btn-md m-auto text-white" href="{{ route('maintenance.edit', $maintenance) }}">Edit Maintenance</a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    @else
        No maintenance records found
    @endif
    
    <a class="btn btn-info float-right" href="/">Back</a>
@endsection