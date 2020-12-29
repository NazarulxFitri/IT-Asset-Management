@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    @if (session('success'))
    <div class="mr-2 ml-2">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Accessory edited.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Accessory</div>

                    <div class="card-body">
                        <form method="POST" action="/accessory/update/{{ $accessory->id }}">
                            @csrf
                            @method('PATCH')
                            
                             <div class="form-group row">
                                <label for="serial_number" class="col-md-3 col-form-label text-md-right">Serial Number</label>

                                <div class="col-md-6">
                                    <input id="serial_number" type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" 
                                           value="{{ $accessory->serial_number }}" disabled autocomplete="serial_number" autofocus>

                                    @error('serial_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="type" name="type" value="{{ $accessory->type }}">
                                        <option disabled selected value>{{ $accessory->type }} | Please re-confirm this field</option>
                                        <option value="Mouse">Mouse</option>
                                        <option value="Keyboard">Keyboard</option>
                                        <option value="Telephone">Telephone</option>
                                        <option value="PC Hardware">PC Hardware</option>
                                        <option value="Power Adapter">Power Adapter</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-3 col-form-label text-md-right">Brand</label>

                                <div class="col-md-6">
                                    <input id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" name="brand" 
                                           value="{{ $accessory->brand }}" required autocomplete="brand" autofocus>

                                    @error('asset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="model" class="col-md-3 col-form-label text-md-right">Model</label>

                                <div class="col-md-6">
                                    <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" 
                                           value="{{ $accessory->model }}" required autocomplete="model" autofocus>

                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="availability" class="col-md-3 col-form-label text-md-right">Availability</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="availability" name="availability" onchange="showMore()" value="{{ $accessory->availability }}">
                                        <option disabled selected value>{{ $accessory->availability }} | Please re-confirm this field</option>
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                        <option value="Owned">Owned</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row" id="hide_on">
                                <label for="owner_name" class="col-md-3 col-form-label text-md-right">Owner Name</label>

                                <div class="col-md-6">
                                    <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" 
                                           value="{{ $accessory->owner_name }}" autocomplete="owner_name" autofocus>

                                    @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row" id="hide_od">
                                <label for="owner_department" class="col-md-3 col-form-label text-md-right">Owner Department</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="owner_department" name="owner_department" value="{{ $accessory->owner_department }}">
                                        <option disabled selected value>{{ $accessory->owner_department }} | Please re-confirm this field</option>
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
                            
                            <div class="form-group row" id="hide_l">
                                <label for="location" class="col-md-3 col-form-label text-md-right">Location</label>

                                <div class="col-md-6">
                                    <select class="form-control"  id="location" name="location" value="{{ $accessory->location }}">
                                        <option disabled selected value>{{ $accessory->location }} | Please re-confirm this field</option>
                                        <option value="Tech Storage-POS Section">TechStorage-POS Section</option>
                                        <option value="Tech Storage-Accessories Section">TechStorage-Accessories Section</option>
                                        <option value="Tech Storage-Exposed Section">TechStorage-Exposed Section</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="d-flex" style="margin-left:auto; margin-right:auto;">
                                    <button type="submit" class="btn btn-dark">
                                        <a>
                                            Edit
                                        </a>
                                    </button>
                                    <button class="btn btn-danger ml-2">
                                        <a href="/accessory/list" style="text-decoration:none; color:#fff;">
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

<script>    
    function showMore()
    {
        var showOwner = document.getElementById("availability").value;
        if (showOwner === "Available" || showOwner === "Not Available")
        {
            document.getElementById("hide_on").style.display = "none";
            document.getElementById("hide_od").style.display = "none";
            document.getElementById("hide_l").style.display = "flex";
        }
        if (showOwner === "Owned")
        {
            document.getElementById("hide_on").style.display = "flex";
            document.getElementById("hide_od").style.display = "flex";
            document.getElementById("hide_l").style.display = "none";
        }
    }
</script>
@endsection