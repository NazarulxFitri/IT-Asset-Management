<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\MonitorController;
use App\Items;
use App\Monitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $availableLaptops = Items::where('condition','Good')
                ->where('owner_name','N/A')
                ->paginate(5);
        $damagedLaptops = Items::where('condition','Poor')->paginate(5);
        
        $totalMonitors = Monitor::all()->count();
        $availableMonitors = Monitor::where('condition','Good')
                ->where('owner_name','N/A')
                ->paginate(5);
        $damagedMonitors = Monitor::where('condition','Poor')->paginate(5);
        
        return view('home',compact('availableLaptops','damagedLaptops',
                'totalMonitors','availableMonitors','damagedMonitors'));
    }
}
