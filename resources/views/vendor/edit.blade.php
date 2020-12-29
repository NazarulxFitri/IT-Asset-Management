@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    @if (session('success'))
    <div class="mr-2 ml-2">
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                Vendor edited.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">Edit Vendor</div>

                    <div class="card-body">
                        <form method="post" action="/vendor/update/{{ $vendor->id }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                           value="{{ $vendor->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <select class="form-control" value="{{ $vendor->type }}" id="type" name="type">
                                        <option disabled selected value>{{ $vendor->type }} | Please re-confirm this field</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Software">Software</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="asset" class="col-md-3 col-form-label text-md-right">Asset</label>

                                <div class="col-md-6">
                                    <input id="asset" type="text" class="form-control @error('asset') is-invalid @enderror" name="asset" 
                                           value="{{ $vendor->asset }}" required autocomplete="asset" autofocus>

                                    @error('asset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="description" 
                                              required autocomplete="description" autofocus>{{ $vendor->description }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_1" class="col-md-3 col-form-label text-md-right">Email Primary</label>

                                <div class="col-md-6">
                                    <input id="email_1" type="text" class="form-control @error('email_1') is-invalid @enderror" name="email_1" 
                                           value="{{ $vendor->email_1 }}" autocomplete="email_1" autofocus>

                                    @error('email_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email_2" class="col-md-3 col-form-label text-md-right">Email Secondary</label>

                                <div class="col-md-6">
                                    <input id="email_2" type="text" class="form-control @error('email_2') is-invalid @enderror" name="email_2" 
                                           value="{{ $vendor->email_2 }}" autocomplete="email_2" autofocus>

                                    @error('email_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="tel_num" class="col-md-3 col-form-label text-md-right">Tel Num</label>

                                <div class="col-md-6">
                                    <input id="tel_num" type="text" class="form-control @error('tel_num') is-invalid @enderror" name="tel_num" 
                                           value="{{ $vendor->tel_num }}" autocomplete="tel_num" autofocus>

                                    @error('tel_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="d-flex" style="margin-left:auto; margin-right:auto;">
                                    <button type="submit" class="btn btn-dark">
                                        <a>
                                            Update
                                        </a>
                                    </button>
                                    <button class="btn btn-danger ml-2">
                                        <a href="/vendor/list" style="text-decoration:none; color:#fff;">
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