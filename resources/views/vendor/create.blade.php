@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    @if (session('success'))
    <div class="mr-2 ml-2">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Vendor created.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="row justify-content-center pt-3 create">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Register Vendor</strong></div>

                    <div class="card-body">
                        <form method="POST" action="/vendor">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Vendor's Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <select class="form-control"  id="type" name="type" value="{{ old('type') }}">
                                        <option disabled selected value> -- Select an option -- </option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Software">Software</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="asset" class="col-md-3 col-form-label text-md-right">Asset</label>

                                <div class="col-md-6">
                                    <input id="asset" type="text" class="form-control @error('asset') is-invalid @enderror" name="asset" 
                                           value="{{ old('asset') }}" required autocomplete="model" autofocus>

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
                                    <textarea id="description" class="form-control @error('asset') is-invalid @enderror" name="description"
                                              value="{{ old('description') }}"></textarea>

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
                                           value="{{ old('email_1') }}" required autocomplete="email_1" autofocus>

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
                                           value="{{ old('email_2') }}" required autocomplete="email_2" autofocus>

                                    @error('email_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel_num" class="col-md-3 col-form-label text-md-right">Tel Number</label>

                                <div class="col-md-6">
                                    <input id="tel_num" type="text" class="form-control @error('tel_num') is-invalid @enderror" name="tel_num" 
                                           value="{{ old('tel_num') }}" required autocomplete="tel_num" autofocus>

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
                                            Create
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