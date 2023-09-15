<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public $name,$slug,$status,$id;

    public function rules(){

        return[
            'name' => 'required |string',
            'slug' =>'required|string',
            'status'=>'nullable'
        ];
    }

    public function resetInput(){

        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->id=null;
    }

    public function storeBrand(){

        $validateData=$this->validate();
        Brands::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Added Successfully!');
        // $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    public function closeModal(){

        $this->resetInput();
    }
    public function openModal(){

    }

    public function editBrand(int $id){
 
    
        $this->id=$id;
        $brand=Brands::findOrFail($id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;

    }
    public function updateBrand(){

        $validateData=$this->validate();
        Brands::find($this->id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand updated Successfully!');
        // $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }

    public function deleteBrands($brand_id){

       
        $this->id=$brand_id;
    }
    
    public function destroyBrand()
    {
      
        $brands=Brands::findOrFail($this->id);
        $brands->delete();
        session()->flash('message','Brand Deleted!');
        // $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    

    public function render()
    {
        $brands= Brands::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index',compact('brands'))->extends('layouts.admin')->section('content');
    }





}
 