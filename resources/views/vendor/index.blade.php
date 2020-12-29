@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @csrf
    <div class="mr-2 ml-2">
        <div class="row pt-3">
            <header>
                <h4>Vendor</h4>
            </header>     
        </div>
        <div class="row">
            <a href="/vendor/create">
                <button class="btn btn-secondary">
                    Create
                </button>
            </a>
        </div>
        <div class="row pt-3">
            <div class="form-group row d-none d-md-block">
                <form action="/vendor/list" method="GET">
                    <div class="d-flex">
                        <input style="margin-left:15px;" type="text" class="form-control" name="qname"
                               placeholder="--Name--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qtype"
                               placeholder="--Type--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qasset"
                               placeholder="--Asset--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qemail_1"
                               placeholder="--Email--">
                        <input style="margin-left:5px;" type="text" class="form-control" name="qtel_num"
                               placeholder="--Tel Num--">
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
                            <th>Name</th>
                            <th>Type</th>
                            <th>Asset</th>
                            <th>Email Primary</th>
                            <th>Email Secondary</th>
                            <th colspan="2">Tel Num</th>
                        </tr>
                    </thead>
                    @foreach ($vendors as $vendor)
                    <tbody>
                        <tr>
                            <td>{{ $vendor->name }}</td>
                            <td>{{ $vendor->type }}</td>
                            <td>{{ $vendor->asset }}</td>
                             <td>{{ $vendor->email_1 }}</td>
                             <td>{{ $vendor->email_2 }}</td>
                            <td>{{ $vendor->tel_num }}</td>
                            <td style="float:right;">
                                <a style="text-decoration:none; color:#892f2f;" href="/vendor/show/{{ $vendor->id }}">Show</a>
                                <a style="text-decoration:none; color:#892f2f;" class="pl-2" href="/vendor/edit/{{ $vendor->id }}">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="row pt-3">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $vendors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection