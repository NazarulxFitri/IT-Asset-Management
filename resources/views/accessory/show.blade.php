@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf

        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Show Accessory</div>

                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="serial_number" class="col-md-3 col-form-label text-md-right">Serial Number</label>

                            <div class="col-md-6">
                                <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" 
                                       value="{{ $accessory->serial_number }}" disabled autocomplete="serial_number" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" 
                                       value="{{ $accessory->type }}" disabled autocomplete="type" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-3 col-form-label text-md-right">Brand</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" 
                                       value="{{ $accessory->brand }}" disabled autocomplete="brand" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-3 col-form-label text-md-right">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" 
                                       value="{{ $accessory->model }}" disabled autocomplete="model" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="availability" class="col-md-3 col-form-label text-md-right">Availability</label>

                            <div class="col-md-6">
                                <input id="availability" type="text" class="form-control @error('availability') is-invalid @enderror" name="availability" 
                                       value="{{ $accessory->availability }}" disabled autocomplete="availability" autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="hide_on">
                            <label for="owner_name" class="col-md-3 col-form-label text-md-right">Owner Name</label>

                            <div class="col-md-6">
                                <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" 
                                       value="{{ $accessory->owner_name }}" disabled autocomplete="owner_name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="hide_od">
                            <label for="owner_department" class="col-md-3 col-form-label text-md-right">Owner Department</label>

                            <div class="col-md-6">
                                <input id="owner_department" type="text" class="form-control @error('owner_department') is-invalid @enderror" name="owner_department" 
                                       value="{{ $accessory->owner_department }}" disabled autocomplete="owner_department" autofocus>
                            </div>
                        </div>

                        <div class="form-group row" id="hide_l">
                            <label for="location" class="col-md-3 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" 
                                       value="{{ $accessory->location }}" disabled autocomplete="location" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex" style="margin-left:auto; margin-right:auto;">
                                <button class="btn btn-dark">
                                    <a href="/accessory/edit/{{ $accessory->id }}" style="text-decoration:none; color:#fff;">Edit</a>
                                </button>
                                <button class="btn btn-danger ml-2">
                                    <a href="/accessory/list" style="text-decoration:none; color:#fff;">Back</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection