@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        Cars List
    </h1>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">Edit Car</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Maintenance on Car</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr class="text-center">
                        <td width="10%" class="align-center">
                            <a class="btn btn-sm btn-warning btn-md m-auto text-white" href="{{ route('car.edit', $car) }}">Edit Car</a>
                        </td>
                        <th scope="row">{{ $car->make }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->colour }}</td>
                        <td width="20%" class="align-center">
                            @if ($car->maintenances->count() > 0)
                                <a class="btn btn-sm btn-info btn-md m-auto text-white" href="{{ route('maintenance.view', $car) }}">View Maintenance</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-success btn-sm float-left ml-2" href="{{ route('car.create') }}">Add Car</a>
    <a class="btn btn-success btn-sm float-left ml-2" href="{{ route('maintenance.create') }}">Maintenance Order</a>
    <a class="btn btn-primary btn-sm float-right ml-2" href="{{ route('export') }}">Export Car Maintenance Data</a>
    @if ($car->maintenances->isNotEmpty())
        <a class="btn btn-info btn-sm float-right" href="/maintenance/index/{{ $car->maintenances }}">All Maintenance</a>
    @endif
@endsection