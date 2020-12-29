@extends('layouts.app')

@section('content')
<div class='container'>
    @csrf
    <div class="mr-2 ml-2">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white"><strong>View Vendor</strong></div>

                    <div class="card-body">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $vendor->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>
                                <div class="col-md-6">
                                   <input type="text" class="form-control" value="{{ $vendor->type }}" disabled >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="asset" class="col-md-3 col-form-label text-md-right">Asset</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $vendor->asset }}" disabled >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" disabled>{{ $vendor->description }}</textarea>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email_1" class="col-md-3 col-form-label text-md-right">Email Primary</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $vendor->email_1 }}" disabled autocomplete="email_1" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email_2" class="col-md-3 col-form-label text-md-right">Email Secondary</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $vendor->email_2 }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel_num" class="col-md-3 col-form-label text-md-right">Tel Num</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{ $vendor->tel_num }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex">
                                    <button class="btn btn-dark">
                                        <a href="/vendor/edit/{{ $vendor->id }}" style="text-decoration:none; color:#fff;">Edit</a>
                                    </button>
                                    <button class="btn btn-danger ml-2">
                                        <a href="/vendor/list" style="text-decoration:none; color:#fff;">Back</a>
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