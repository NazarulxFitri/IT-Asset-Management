@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @csrf
    <div class="mr-2 ml-2">
        <div class="row pt-3">
            <header>
                <h4>Accessory</h4>
            </header>     
        </div>
        <div class="row">
            <a href="/accessory/create">
                <button class="btn btn-secondary">
                    Create
                </button>
            </a>
        </div>
        <div class="row pt-3">
            <div class="form-group row d-none d-md-block">
                <form action="/accessory/list" method="GET">
                    <div class="d-flex">
                        <input style="margin-left:15px;" type="text" class="form-control" name="qtype"
                               placeholder="--Type--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qbrand"
                               placeholder="--Brand--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qmodel"
                               placeholder="--Model--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qavailability"
                               placeholder="--Availability--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qloaction"
                               placeholder="--Location--">
                        <div class="form-group">
                            <div class="pr-3 pl-2">
                                <button type="submit" class="btn btn-secondary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table" style="table-layout:auto; width:100;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Availability</th>
                            <th colspan="2">Location</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($accessories as $accessory)
                        <tr>
                            <td>{{ $accessory->type }}</td>
                            <td>{{ $accessory->brand }}</td>
                            <td>{{ $accessory->model }}</td>
                            <td>{{ $accessory->availability }}</td>
                            <td>{{ $accessory->location }}</td>
                            <td style="float:right;">
                                <a style="text-decoration:none; color:#892f2f;" href="/accessory/show/{{ $accessory->id }}">Show</a>
                                <a style="text-decoration:none; color:#892f2f;" class="pl-2" href="/accessory/edit/{{ $accessory->id }}">Edit</a>          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row pt-3">
                    <div class="col-12 d-flex justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection