<?php

namespace App\Http\Controllers;

use App\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) 
    {
        $qtype = $request->input('qtype');
        $qbrand = $request->input('qbrand');
        $qmodel = $request->input('qmodel');
        $qavailability = $request->input('qavailability');
        $qlocation = $request->input('qlocation');

        $accessories = Accessory::where('type','LIKE','%'.$qtype.'%')
                ->where('brand','LIKE','%'.$qbrand.'%')
                ->where('model','LIKE','%'.$qmodel.'%')
                ->where('availability','LIKE','%'.$qavailability.'%')
                ->where('location','LIKE','%'.$qlocation.'%')
                ->paginate(20);
        
        return view('accessory.index',compact('accessories'));
    }
    
    public function create()
    {
        return view('accessory.create');
    }
    
    public function store(Request $request)
    {   
        $data = request()->validate([
            'serial_number' => 'required|unique:accessories',
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'availability' => 'required',
            'owner_name' => 'nullable',
            'owner_department' => 'nullable',
            'location' => 'nullable',
        ]);
        
        $accessory = new Accessory();
        $accessory->serial_number = $request->input('serial_number');
        $accessory->type = $request->input('type');   
        $accessory->brand = $request->input('brand');
        $accessory->model = $request->input('model');
        $accessory->availability = $request->input('availability');
        
        if ($accessory->availability == 'Available' OR $accessory->availability == 'Not Available')
        {
            $accessory->owner_name = 'N/A';
            $accessory->owner_department = 'N/A';
            $accessory->location = $request->input('location');
        }
        if ($accessory->availability == 'Owned')
        {
            $accessory->owner_name = $request->input('owner_name');
            $accessory->owner_department = $request->input('owner_department');
            $accessory->location = 'Owner';
        } 
        
        $accessory->save();
        
        return redirect()->back()->withSuccess('Successful');
    }
    
    public function show($id)
    {
        $accessory = Accessory::find($id);
        return view('accessory.show',compact('accessory'));
    }
    
    public function edit($id)
    {
        $accessory = Accessory::find($id);
 
        return view('accessory.edit',compact('accessory'));
    }
    
    public function update(Request $request, $id)
    {
        $accessory = Accessory::find($id);
        $accessory->serial_number = $request->input('serial_number');  
        $accessory->type = $request->input('type');   
        $accessory->brand = $request->input('brand');
        $accessory->model = $request->input('model');
        $accessory->availability = $request->input('availability');

        if ($accessory->availability == 'Available' OR $accessory->availability == 'Not Available')
        {
            $accessory->owner_name = 'N/A';
            $accessory->owner_department = 'N/A';
            $accessory->location = $request->input('location');
        }
        if ($accessory->availability == 'Owned')
        {
            $accessory->owner_name = $request->input('owner_name');
            $accessory->owner_department = $request->input('owner_department');
            $accessory->location = 'Owner';
        }
        
        $accessory->save();
        
        return redirect('/accessory/list');
    }
}
