<?php

namespace App\Http\Controllers;

use App\Monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $qserial_number = $request->input('qserial_number');
        $qbrand = $request->input('qbrand');
        $qmodel = $request->input('qmodel');
        $qcolor = $request->input('qcolor');
        $qcondition = $request->input('qcondition');
        $qowner_name = $request->input('qowner_name');
        $qowner_dept = $request->input('qowner_dept');

        $monitors = Monitor::where('serial_number','LIKE','%'.$qserial_number.'%')
                ->where('brand','LIKE','%'.$qbrand.'%')
                ->where('model','LIKE','%'.$qmodel.'%')
                ->where('color','LIKE','%'.$qcolor.'%')
                ->where('condition','LIKE','%'.$qcondition.'%')
                ->where('owner_name','LIKE','%'.$qowner_name.'%')
                ->where('owner_department','LIKE','%'.$qowner_dept.'%')
                ->paginate(20);
        
        return view('monitor.index',compact('monitors'));   
    }
    
    public function create()
    {
        return view('monitor.create');
    }
    
    public function bulkCreate()
    {
        return view('monitor.bulk_create');
    }
    
    public function store(Request $request)
    {
        $data = request()->validate([
            'serial_number' => 'required|unique:monitors',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'condition' => 'nullable',
            'owner_name' => 'nullable',
            'owner_department' => 'nullable',
        ]);

        $monitor = new Monitor();
        $monitor->serial_number = $request->input('serial_number');   
        $monitor->model = $request->input('model');
        $monitor->brand = $request->input('brand');
        $monitor->color = $request->input('color');
        $monitor->condition = $request->input('condition');
        $monitor->owner_name = $request->input('owner_name');
        $monitor->owner_department = $request->input('owner_department');
        $monitor->save();
        
        return redirect()->back()->withSuccess('Successful');
    }
    
    public function bulkStore(Request $request)
    {        
        $file = $request->file('file')->getRealPath();
        $arrExcel = array_map('str_getcsv', file($file));
        $rows = array_slice($arrExcel, 1);
        
        for ($i = 0; $i < count($rows); $i++)
        {           
            $monitor = new Monitor();
            $monitor->serial_number = $rows[$i][0];
            $monitor->model = $rows[$i][1];
            $monitor->brand = $rows[$i][2];
            $monitor->color = $rows[$i][3];
            $monitor->condition = $rows[$i][4];
            $monitor->owner_name = $rows[$i][5];
            $monitor->owner_department = $rows[$i][6];
            $monitor->save();
        }
        return redirect()->back()->withSuccess('Successful');
    }
    
    public function show($id)
    {
        $monitor = Monitor::find($id);

        return view('monitor.show',compact('monitor'));
    }
    
    public function edit($id)
    {
        $monitor = Monitor::find($id);
 
        return view('monitor.edit',compact('monitor'));
    }
    
    public function update(Request $request, $id)
    {
        $monitor = Monitor::find($id);
        $monitor->serial_number = $request->input('serial_number');   
        $monitor->model = $request->input('model');
        $monitor->brand = $request->input('brand');
        $monitor->color = $request->input('color');
        $monitor->condition = $request->input('condition');
        $monitor->owner_name = $request->input('owner_name');
        $monitor->owner_department = $request->input('owner_department');
        $monitor->save();
        
        return redirect('/monitor/list');
    }
}
