<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }


    public function create(){
        return view('admin.slider.create');
    }

    public function store(SliderFormRequest $request){
        
        $validatedData=$request->validated();

        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext =$file->getClientOriginalExtension();
            $filename=time().'.'.$ext ;
            $file->move('uploads/slider/',$filename);
            $validatedData['image']= "uploads/slider/$filename";
        }


        $validatedData['status']=$request->status == true ? '1':'0';

        Slider::create([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'image'=>$validatedData['image'],
            'status'=>$validatedData['status'],
        ]);
        
        return redirect('admin/sliders')->with('message',"Slider Added Sucessfully!");
    }

    public function edit($id){

        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));

    }
    public function update(SliderFormRequest $request,$id)
    {
        $validatedData=$request->validated();

        $slider=Slider::findOrFail($id);


        $slider->title=$validatedData['title'];
        // $slider->slug=Str::slug($validatedData['slug']);
        $slider->description=$validatedData['description'];
        $slider->status=$request->status == true ? '1' :'0';




        if($request->hasFile('image')){

            if ($request->hasFile('image')){

                // check for path
                // $path='uploads/slider/'.$slider->image;
                $path=$slider->image;
                // dd($path);

                if(File::exists($path)){
                    File::delete($path);
                }
        }

            $file =$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext ;


            $file->move('uploads/slider/',$filename);
            $slider->image= $filename;
          
        }
   
        $slider->update();
        return redirect('admin/sliders')->with('message',"Slider Updated   Sucessfully!");

    }

    public function delete($id){
        $slider=Slider::findOrFail($id);

            // check for path
            // $path='uploads/slider/'.$slider->image;
        $path=$slider->image;
            // dd($path);
            if(File::exists($path)){
                File::delete($path);
            }
        
        $slider->delete(); 
        return back()->with('message',"Slider Deleted Successfully");
    }
 }
