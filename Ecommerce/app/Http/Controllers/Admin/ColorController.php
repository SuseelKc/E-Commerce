<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    
     public function index(){
       $colors=Color::all();
        return view('admin.color.index',compact('colors'));
     }

     public function create(){
        return view('admin.color.create');
     }
     public function store(ColorFormRequest $request){
        
        $validatedData=$request->validated();
        $validatedData['status']=$request->status == true ?'1':'0';
        Color::create($validatedData);
        return redirect('admin/color')->with('message','Color Added Successfully');

     }
     public function edit(int $id){

      $colors=Color::findOrFail($id);
      return view('admin.color.edit',compact('colors'));

     }

     public function update(ColorFormRequest $request,$id){
      $validatedData=$request->validated();
      $validatedData['status']=$request->status == true ?'1':'0';
      Color::find($id)->update($validatedData);
      return redirect('admin/color')->with('message','Color Updated Successfully');
     } 

     public function delete($id){

      $color=Color::findOrFail($id);
      $color->delete();
      return back()->with('message','Color Deleted!');

     }

}
