<?php

namespace App\Http\Controllers;

use App\Items;
use App\Defect;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
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

        $items = Items::where('serial_number','LIKE','%'.$qserial_number.'%')
                ->where('brand','LIKE','%'.$qbrand.'%')
                ->where('model','LIKE','%'.$qmodel.'%')
                ->where('color','LIKE','%'.$qcolor.'%')
                ->where('condition','LIKE','%'.$qcondition.'%')
                ->where('owner_name','LIKE','%'.$qowner_name.'%')
                ->where('owner_department','LIKE','%'.$qowner_dept.'%')
                ->paginate(20);
        
        return view('item.index', compact('items'));
    }
    
    public function create()
    {
        return view('item.create');
    }
    
    public function bulkCreate()
    {
        return view('item.bulk_create');
    }
    
    public function store(Request $request)
    {   
        $data = request()->validate([
            'serial_number' => 'required|unique:items',
            'brand' => 'required',
            'model' => 'required',
            'processor' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'color' => 'required',
            'condition' => 'required',
            'image_1' => ['nullable','image'],
            'image_2' => ['nullable','image'],
            'image_3' => ['nullable','image'],
            'owner_name' => 'required',
            'owner_department' => 'nullable',
        ]);
        
        if (request('image_1')) {
            $imagePath_1 = request('image_1')->store('uploads', 'public');
            $image_1 = Image::make(public_path("storage/{$imagePath_1}"));
            $image_1->save();
        }
        else {
            $imagePath_1 = NULL;
        }
        
        if (request('image_2')) {
            $imagePath_2 = request('image_2')->store('uploads', 'public');
            $image_2 = Image::make(public_path("storage/{$imagePath_2}"));
            $image_2->save();
        }
        else {
            $imagePath_2 = NULL;
        }
        
        if (request('image_3')) {
            $imagePath_3 = request('image_3')->store('uploads', 'public');
            $image_3 = Image::make(public_path("storage/{$imagePath_3}"));
            $image_3->save();
        }
        else {
            $imagePath_3 = NULL;
        }

        $item = new Items();
        $item->serial_number = $request->input('serial_number'); 
        $item->brand = $request->input('brand');
        $item->model = $request->input('model');
        $item->processor = $request->input('processor');
        $item->ram = $request->input('ram');
        $item->storage = $request->input('storage');
        $item->color = $request->input('color');
        $item->condition = $request->input('condition');
        $item->image_1 = $imagePath_1;
        $item->image_2 = $imagePath_2;
        $item->image_3 = $imagePath_3;
        $item->owner_name = $request->input('owner_name');
        $item->owner_department = $request->input('owner_department');
        $item->save();
        
        return redirect()->back()->withSuccess('Successful');
    }
    
    public function bulkStore(Request $request)
    {        
        $file = $request->file('file')->getRealPath();
        $arrExcel = array_map('str_getcsv', file($file));
        $rows = array_slice($arrExcel, 1);
        
        for ($i = 0; $i < count($rows); $i++)
        {           
            $item = new Items();
            $item->serial_number = $rows[$i][0];
            $item->model = $rows[$i][1];
            $item->brand = $rows[$i][2];
            $item->color = $rows[$i][3];
            $item->condition = $rows[$i][4];
            $item->owner_name = $rows[$i][5];
            $item->owner_department = $rows[$i][6];
            $item->save();
        }
        return redirect()->back()->withSuccess('Successful');
    }

    public function show($id)
    {
        $item = Items::find($id);
        $defects = Defect::where('item_id',$id)->get();

        return view('item.show',compact('item','defects'));
    }
    
    public function edit($id)
    {
        $item = Items::find($id);

        return view('item.edit',compact('item'));
    }
    
    public function update(Request $request, $id)
    {
        $item = Items::find($id);
        $item->serial_number = $request->input('serial_number');   
        $item->brand = $request->input('brand');
        $item->model = $request->input('model');
        $item->processor = $request->input('processor');
        $item->ram = $request->input('ram');
        $item->storage = $request->input('storage');    
        $item->color = $request->input('color');
        $item->condition = $request->input('condition');
        $item->owner_name = $request->input('owner_name');
        $item->owner_department = $request->input('owner_department');
        $item->save();
        
        return redirect('/item/list');
    }  
}
