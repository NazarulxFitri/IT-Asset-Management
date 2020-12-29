@extends('layouts.app')

@section('content')
<div class='container-fluid'>
    @csrf
    @if (session('success'))
    <div class="mr-2 ml-2">
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                Monitor created.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Create Monitor (Bulk)</div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <a style="color:#892f2f; text-decoration:none;" href="{{ url('/sample/sample_laptop_bulk_upload.csv') }}">Click here to download sample file</a>
                                <br>
                                Please ensure below concerns are checked:
                                <ul>
                                    <li>Only CSV, XLSX & XLS type are allowed to be submit</li>
                                    <li>Fill in: Serial Number, Brand, Model, Color, Condition, Owner Name & Owner Department</li>
                                    <li>Follow the arrangement according above order</li>
                                    <li>Serial Number must be unique</li>
                                    <li>Enter 'N/A' for any fields if it does not have any information</li>
                                </ul>
                            </div>
                        </div>
                        
                        <form method="POST" action="/monitor/bulk-store" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-md-3 col-form-label text-md-right">Upload CSV File</label>

                                <div class="col-md-6">
                                    <input style="padding:3px !important;" id="file" type="file" name="file" 
                                           required>
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        <a>
                                            Create
                                        </a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a href="/item/list" style="text-decoration:none; color:#fff;">
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