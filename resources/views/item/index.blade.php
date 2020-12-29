@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @csrf
    <div class="mr-2 ml-2">
        <div class="row pt-3">
            <header>
                <h4>Laptop</h4>
            </header>     
        </div>
        <div class="row">
            <a href="/item/create">
                <button class="btn btn-secondary">
                    Create
                </button>
            </a>
        </div>
        <div class="row pt-3">
            <div class="form-group row d-none d-md-block">
                <form action="/item/list" method="GET">
                    <div class="d-flex">
                        <input style="margin-left:15px;" type="text" class="form-control" name="qserial_number"
                               placeholder="--Serial Number--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qbrand"
                               placeholder="--Brand--">
                         <input style="margin-left:5px;" type="text" class="form-control" name="qmodel"
                               placeholder="--Model--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qcondition"
                               placeholder="--Condition--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qowner_name"
                               placeholder="--Owner Name--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qowner_dept"
                               placeholder="--Owner Dept--">
                        <div class="form-group pr-3 pl-2">
                            <button type="submit" class="btn btn-secondary">
                                Search
                            </button>
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
                            <th>Serial Number</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Condition</th>
                            <th>Owner Name</th>
                            <th colspan="2">Owner Department</th>
                        </tr>
                    </thead>
                    @foreach ($items as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->serial_number }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->model }}</td>
                            <td>{{ $item->condition }}</td>
                            <td>{{ $item->owner_name }}</td>
                            <td>{{ $item->owner_department }}</td>
                            <td style="float:right;">
                                <a style="text-decoration:none; color:#892f2f;" href="/item/show/{{ $item->id }}">Show</a>
                                <a style="text-decoration:none; color:#892f2f;" class="pl-2" href="/item/edit/{{ $item->id }}">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="row pt-3">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection