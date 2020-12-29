@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    @if (session('success'))
    <div class="mr-2 ml-2">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Monitor created.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="row justify-content-center pt-3 create">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white"><strong>Create Monitor</strong></div>

                    <div class="card-body">
                        <p><a style="color:#892f2f; text-decoration:none;" href="{{ url('/monitor/bulk-create') }}">Click here to do <strong>Bulk Create</strong></a></p>
                        <form method="POST" action="/monitor">
                            @csrf

                            <div class="form-group row">
                                <label for="serial_number" class="col-md-3 col-form-label text-md-right">Serial Number</label>

                                <div class="col-md-6">
                                    <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" 
                                           value="{{ old('serial_number') }}" required autocomplete="serial_number" autofocus>

                                    @error('serial_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-3 col-form-label text-md-right">Brand</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="brand" name="brand" value="{{ old('brand') }}">
                                        <option disabled selected value> -- Select an option -- </option>
                                        <option value="Acer">Acer</option>
                                        <option value="Apple">Apple</option>
                                        <option value="Benq">Benq</option>
                                        <option value="Dell">Dell</option>
                                        <option value="Hp">Hp</option>
                                        <option value="Lenovo">Lenovo</option>
                                        <option value="Lg">Lg</option>
                                        <option value="Samsung">Samsung</option>
                                        <option value="ViewSonic">ViewSonic</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-3 col-form-label text-md-right">Model</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" 
                                           value="{{ old('model') }}" required autocomplete="model" autofocus>

                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-3 col-form-label text-md-right">Color</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" 
                                           value="{{ old('color') }}" required autocomplete="color" autofocus>

                                    @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="condition" class="col-md-3 col-form-label text-md-right">Condition</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="condition" name="condition" value="{{ old('condition') }}" required>
                                        <option disabled selected value> -- Select an option -- </option>
                                        <option value="Good">Good</option>
                                        <option value="Poor">Poor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_name" class="col-md-3 col-form-label text-md-right">Owner Name</label>

                                <div class="col-md-6">
                                    <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" 
                                           value="{{ old('owner_name') }}" required autocomplete="owner_name" autofocus>

                                    @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_department" class="col-md-3 col-form-label text-md-right">Owner Department</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="owner_department" name="owner_department" value="{{ old('owner_department') }}" required>
                                        <option disabled selected value> -- Select an option -- </option>
                                        <option value="N/A">N/A</option>
                                        <option value="dUCk">dUCk</option>
                                        <option value="Sitca">Sitca</option>
                                        <option value="FV-Buying">FV-Buying</option>
                                        <option value="FV-Content">FV-Content</option>
                                        <option value="FV-CS">FV-CS</option>
                                        <option value="FV-Engineering">FV-Engineering</option>
                                        <option value="FV-Finance">FV-Finance</option>
                                        <option value="FV-Management">FV-Management</option>
                                        <option value="FV-Marketing">FV-Marketing</option>
                                        <option value="FV-People">FV-People</option> 
                                        <option value="FV-Retail">FV-Retail</option>
                                        <option value="FV-Warehouse">FV-Warehouse</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="d-flex" style="margin-left:auto; margin-right:auto;">
                                    <button type="submit" class="btn btn-dark">
                                        <a>
                                            Create
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