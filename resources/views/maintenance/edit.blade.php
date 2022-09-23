@extends('layouts.app')

@section('title', 'Car Maintenance')

@section('banner')
    <h1 class="text-center">
        Maintenance Edit 
    </h1>
@endsection

@section('content')
<div class="card-body border rounded">
    <form action="{{ route('maintenance.update', $maintenance) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
            <fieldset class="form-group">
                <div class="row border-bottom">
                    <h3 class="text-center">
                        Date: {{ $maintenance->date_completed->format('F d, Y \a\t H:i:s A') }}
                    </h3>
                </div><br>
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Maintenance Work: </legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="oil_changes" id="gridChecks1" {{ $maintenance->oil_changes ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridChecks1">Oil Changes</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tire_rotations" id="gridChecks2" {{ $maintenance->tire_rotations ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridChecks2">Tire Rotations</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tune_ups" id="gridChecks3" {{ $maintenance->tune_ups ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridChecks3">Tune-ups</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="repairs" id="gridChecks4" {{ $maintenance->repairs ? 'checked' : '' }}>
                        <label class="form-check-label" for="gridChecks4">Repairs</label>  
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="{{ $maintenance->price }}">
            </div>
            <label for="notes">Notes</label>
            <textarea class="form-control" name="notes" rows="3">{{ $maintenance->notes }}</textarea>
            <br>
            <div class="form-group border-bottom">
                <button class="btn btn-sm btn-success mb-3" onclick="return confirm('Are you sure you want to edit the maintenance?')">Edit Maintenance</button>
                <a class="btn btn-danger btn-sm mb-3 " href="{{ route('maintenance.destroy', $maintenance)}}" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
            </div>
    </form>
</div>
<br>
<a class="btn btn-lg btn-info text-light mb-3 float-right" href="{{ route('maintenance.view', $maintenance->car) }}">Back</a>
@endsection