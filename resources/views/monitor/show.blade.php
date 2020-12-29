@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    <div class="mr-2 ml-2">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Show Monitor</div>

                    <div class="card-body">
                            @csrf
                            <div class="form-group row">
                                <label for="serial_number" class="col-md-3 col-form-label text-md-right">Serial Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->serial_number }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-3 col-form-label text-md-right">Brand</label>
                                <div class="col-md-6">
                                   <input type="text" class="form-control" value="{{ $monitor->brand }}" disabled >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-3 col-form-label text-md-right">Model</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->model }}" disabled >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-3 col-form-label text-md-right">Color</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->color }}" disabled autocomplete="color" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="condition" class="col-md-3 col-form-label text-md-right">Condition</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->condition }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_name" class="col-md-3 col-form-label text-md-right">Owner Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->owner_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_department" class="col-md-3 col-form-label text-md-right">Owner Department</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $monitor->owner_department }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex">
                                    <button class="btn btn-dark">
                                        <a href="/monitor/edit/{{ $monitor->id }}" style="text-decoration:none; color:#fff;">
                                            Edit
                                        </a>
                                    </button>
                                    <button class="btn btn-danger ml-2">
                                        <a href="/monitor/list" style="text-decoration:none; color:#fff;">
                                            Back
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection