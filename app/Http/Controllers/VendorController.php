<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function  index(Request $request)
    {
        $qname = $request->input('qname');
        $qtype = $request->input('qtype');
        $qasset = $request->input('qasset');
        $qemail_1 = $request->input('qemail_1');
        $qtel_num = $request->input('qtel_num');

        $vendors = Vendor::where('name','LIKE','%'.$qname.'%')
                ->where('type','LIKE','%'.$qtype.'%')
                ->where('asset','LIKE','%'.$qasset.'%')
                ->where('email_1','LIKE','%'.$qemail_1.'%')
                ->where('tel_num','LIKE','%'.$qtel_num.'%')
                ->paginate(20);
        
        return view('vendor.index', compact('vendors'));
    }
    
    public function create()
    {
        return view('vendor.create');
    }
    
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|unique:vendors',
            'type' => 'required',
            'asset' => 'required',
            'description' => 'required|max:255',
            'email_1' => 'nullable',
            'email_2' => 'nullable',
            'tel_num' => 'required',
        ]);
        
        $vendor = new Vendor();
        $vendor->name = $request->input('name');   
        $vendor->type = $request->input('type');
        $vendor->asset = $request->input('asset');
        $vendor->description = $request->input('description');
        $vendor->email_1 = $request->input('email_1');
        $vendor->email_2 = $request->input('email_2');
        $vendor->tel_num = $request->input('tel_num');
        $vendor->save();
        
        return redirect()->back()->withSuccess('Successful');
    }
    
    public function show($id)
    {
        $vendor = Vendor::find($id);

        return view('vendor.show',compact('vendor'));
    }
    
    public function edit($id)
    {
        $vendor = Vendor::find($id);
 
        return view('vendor.edit',compact('vendor'));
    }
    
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $vendor->name = $request->input('name');   
        $vendor->type = $request->input('type');
        $vendor->asset = $request->input('asset');
        $vendor->description = $request->input('description');
        $vendor->email_1 = $request->input('email_1');
        $vendor->email_2 = $request->input('email_2');
        $vendor->tel_num = $request->input('tel_num');
        $vendor->save();
        
        return redirect('/vendor/list');
    }
}
