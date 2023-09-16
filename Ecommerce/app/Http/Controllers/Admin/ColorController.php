<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    
     public function index(){
        return view('admin.color.index');
     }

     public function create(){
        return view('admin.color.create');
     }
     public function store(ColorFormRequest $request){
        
        $validatedData=$request->validated();
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','Color Added Successfully');

     }
}
