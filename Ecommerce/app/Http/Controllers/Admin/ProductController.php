<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $categories=Category::all();
        $brands=Brands::all();
        return view('admin.products.create',compact('categories','brands'));
    }

    public function store(ProductFormRequest $request){

        $validatedData= $request->validated();

        $category=Category::findOrFail($validatedData['category_id']);
        $product=$category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>Str::slug($validatedData['slug']),
            'brand'=>$validatedData['brand'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'original_price'=>$validatedData['original_price'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
            'trending'=>$request->trending == true ? '1':'0',
            'status'=>$request->status == true ? '1':'0',
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description']


        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';


            $i=1;
            foreach($request->file('image')as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename= time().$i++.'.'.$extension;  //to create unique file image name
                $imageFile->move($uploadPath,$filename);
                $fileImagePathName=$uploadPath.$filename;

                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$fileImagePathName,
        
                ]);

            }
        }
        return redirect('/admin/products')->with('message','Product added Sucessfully!');

    }

    public function edit(int $id){

        $product = Product::findOrFail($id);
        $categories=Category::all();
        $brands=Brands::all();
        return view('admin.products.edit',compact('product','categories','brands'));
    }

    public function update(int $id,ProductFormRequest $request){

        $validatedData =$request->validated();

        $product = Category::findOrFail($validatedData['category_id'])->products()->where('id',$id)->first();

        if($product){
        $product->update([

            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=>Str::slug($validatedData['slug']),
            'brand'=>$validatedData['brand'],
            'small_description'=>$validatedData['small_description'],
            'description'=>$validatedData['description'],
            'original_price'=>$validatedData['original_price'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
            'trending'=>$request->trending == true ? '1':'0',
            'status'=>$request->status == true ? '1':'0',
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description']


        ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';


                $i=1;
                foreach($request->file('image')as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename= time().$i++.'.'.$extension;  //to create unique file image name
                    $imageFile->move($uploadPath,$filename);
                    $fileImagePathName=$uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id'=>$product->id,
                        'image'=>$fileImagePathName,
            
                    ]);

                }
            }
            return redirect('/admin/products')->with('message','Product Upated Sucessfully!');


        }
        else
        {
        return redirect('admin/products')->with('message','No such Product Id found');
        }

    }

    public function destroyImage(int $id){
        // dd($id);
        $productImage=ProductImage::findOrFail($id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return back()->with('message',"Image Deleted Successfully");


    }

    // public function destroyProduct(int $id){

    //     $product=Product::findOrFail($id);
    //     $productImage=ProductImage::findOrFail($product_id)->where('product_id',$product->id);
    //     dd($productImage);
    //     if(File::exists($productImage->image)){
    //         File::delete($productImage->image);
    //     }
    //     $productImage->delete();
    //     $product->delete();



    // }
    public function destroyProduct(int $id) {
        $product = Product::findOrFail($id);
    
        // Find and delete related ProductImages
        $productImages = ProductImage::where('product_id', $product->id)->get();
    
        foreach ($productImages as $productImage) {
            if (File::exists($productImage->image)) {
                File::delete($productImage->image);
            }
            $productImage->delete();
        }
    
        // Delete the product itself
        $product->delete();
        return back()->with('message',"Product Deleted Successfully");
    
    }
    
}
