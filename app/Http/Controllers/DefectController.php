<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Defect;
use Intervention\Image\Facades\Image;

class DefectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request, $id)
    {
        $item = Items::find($id);
        
        
        $data = request()->validate([
           'text' => 'nullable',
           'defectImage' => ['required','image'],
        ]);
        
        $imagePath = request('defectImage')->store('uploads','public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();
        
        $defect = new Defect();
        $defect->text = $request->input('text');
        $defect->defectImage = $imagePath;
        $defect->item_id = $item->id;
        $defect->save();
        
        return back();
    }   
}
