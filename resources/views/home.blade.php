@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="mr-2 ml-2">
        <div class="row pt-3">
            <header>
                <h4>Dashboard</h4>
            </header>
        </div>
        
        <div class="row pt-3 d-flex">      
            <div>
                <div class="d-flex">
                    <h5>Available Laptops</h5>
                    <p class="pl-2">
                        <a href="/item/list?qcondition=Good&qowner_name=N%2FA" style="text-decoration:none; color:#892f2f;">
                            ({{ $availableLaptops->count() }})
                        </a>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table" style="table-layout:fixed; width:100;">
                        <thead class="thead-dark">
                            <tr>
                                <th style="word-wrap: break-word">Serial Number</th>
                                <th style="word-wrap: break-word">Brand</th>
                                <th style="word-wrap: break-word">Model</th>
                                <th style="word-wrap: break-word">Color</th>
                            </tr>
                        </thead>
                        @foreach ($availableLaptops as $availableLaptop)
                        <tbody>
                            <tr>
                                <td style="word-wrap: break-word">{{ $availableLaptop->serial_number }}</td>
                                <td style="word-wrap: break-word">{{ $availableLaptop->brand }}</td>
                                <td style="word-wrap: break-word">{{ $availableLaptop->model }}</td>
                                <td style="word-wrap: break-word">{{ $availableLaptop->color }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row pt-3" style="padding-left: 20px !important;">
                    <div class="d-flex justify-content-center">
                        {{ $availableLaptops->links() }}
                    </div>
                </div>
            </div>
        </div>
            
        <div class="row pt-3">
            <div>
                <div class="d-flex">
                    <h5>Available Monitors</h5>
                    <p class="pl-2">
                        <a href="/monitor/list?qcondition=Good&qowner_name=N%2FA" style="text-decoration:none; color:#892f2f;">
                            ({{ $availableMonitors->count() }})
                        </a>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table" style="table-layout:fixed; width:100;">
                        <thead class="thead-dark">
                            <tr>
                                <th style="word-wrap: break-word">Serial Number</th>
                                <th style="word-wrap: break-word">Brand</th>
                                <th style="word-wrap: break-word">Model</th>
                                <th style="word-wrap: break-word">Color</th>
                            </tr>
                        </thead>
                        @foreach ($availableMonitors as $availableMonitor)
                        <tbody>
                            <tr>
                                <td style="word-wrap: break-word">{{ $availableMonitor->serial_number }}</td>
                                <td style="word-wrap: break-word">{{ $availableMonitor->brand }}</td>
                                <td style="word-wrap: break-word">{{ $availableMonitor->model }}</td>
                                <td style="word-wrap: break-word">{{ $availableMonitor->color }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row pt-3" style="padding-left: 20px !important;">
                    <div class="d-flex justify-content-center">
                        {{ $availableMonitors->links() }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row pt-3">
            <div>
                <div class="d-flex">
                    <h5>Damaged Laptops</h5>
                    <p class="pl-2">
                        <a href="/item/list?qcondition=Poor" style="text-decoration:none; color:#892f2f;">
                            ({{ $damagedLaptops->count() }})
                        </a>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table" style="table-layout:fixed; width:100;">
                        <thead class="thead-dark">
                            <tr>
                                <th style="word-wrap: break-word">Serial Number</th>
                                <th style="word-wrap: break-word">Brand</th>
                                <th style="word-wrap: break-word">Model</th>
                                <th style="word-wrap: break-word">Color</th>
                            </tr>
                        </thead>
                        @foreach ($damagedLaptops as $damagedLaptop)
                        <tbody>
                            <tr>
                                <td style="word-wrap: break-word">{{ $damagedLaptop->serial_number }}</td>
                                <td style="word-wrap: break-word">{{ $damagedLaptop->brand }}</td>
                                <td style="word-wrap: break-word">{{ $damagedLaptop->model }}</td>
                                <td style="word-wrap: break-word">{{ $damagedLaptop->color }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row pt-3" style="padding-left: 20px !important;">
                    <div class="d-flex justify-content-center">
                        {{ $damagedLaptops->links() }}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row pt-3">
            <div>
                <div class="d-flex">
                    <h5>Damaged Monitors</h5>
                    <p class="pl-2">
                        <a href="/monitor/list?qcondition=Poor" style="text-decoration:none; color:#892f2f;">
                            ({{ $damagedMonitors->count() }})
                        </a>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table" style="table-layout:fixed; width:100;">
                        <thead class="thead-dark">
                            <tr>
                                <th style="word-wrap: break-word">Serial Number</th>
                                <th style="word-wrap: break-word">Brand</th>
                                <th style="word-wrap: break-word">Model</th>
                                <th style="word-wrap: break-word">Color</th>
                            </tr>
                        </thead>
                        @foreach ($damagedMonitors as $damagedMonitor)
                        <tbody>
                            <tr>
                                <td style="word-wrap: break-word">{{ $damagedMonitor->serial_number }}</td>
                                <td style="word-wrap: break-word">{{ $damagedMonitor->brand }}</td>
                                <td style="word-wrap: break-word">{{ $damagedMonitor->model }}</td>
                                <td style="word-wrap: break-word">{{ $damagedMonitor->color }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="row pt-3" style="padding-left: 20px !important;">
                    <div class="d-flex justify-content-center">
                        {{ $damagedMonitors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
