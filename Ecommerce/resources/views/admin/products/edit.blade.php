@extends('layouts.admin')


@section('content')

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif  


<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3>Edit Product
                <a href="{{url('admin/products')}}" class="btn btn-danger btn-sm  text-white float-end">Back</a>
            </h3>
        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    <div> {{$error}}</div>
                @endforeach
            </div>
            @endif    

            <form action="{{url('admin/products/'.$product->id.'/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method("PUT") --}}
              

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                        Home
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                        Details
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                         Product Image
                                    </button>
                                </li>
                            
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" >
                                         Product Colors
                                    </button>
                                </li>
                            </ul>
                           
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane  border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <div class="mb-3">
                                            <label>
                                                Category
                                            </label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" 
                                                        {{$category->id == $product->category_id ? 'selected' : ''}}
                                                        >
                                                        {{$category->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Product Name</label>
                                            <input type="text" name="name"  value="{{$product->name}}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label>Product Slug</label>
                                            <input type="text" name="slug"  value="{{$product->slug}}" class="form-control"/>
                                        </div>

                                        <div class="mb-3">
                                            <label>
                                                Select Brands
                                            </label>
                                            <select name="brand" class="form-control">
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected':''}}>
                                                        {{$brand->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Small Description(500 words)</label>
                                            <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                                        </div>      

                                    </div>
                                    <div class="tab-pane border p-3 fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                        <div class="mb-3">
                                            <label>Meta Title</label>
                                            <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control"/>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Description</label>
                                            <input type="text" name="meta_description" value="{{$product->meta_description}}" class="form-control" row="4"/>
                                        </div>
                                        <div class="mb-3">
                                            <label>Meta Keyword</label>
                                            <input type="text" name="meta_keyword"  value="{{$product->meta_keyword}}" class="form-control" row="4"/>
                                        </div>

                                    </div>
                                    <div class="tab-pane border p-3 fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Original Price</label>
                                                    <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                                                </div>   
                                            </div>
                                            {{-- selling price --}}
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Selling Price</label>
                                                    <input type="number" name="selling_price" value="{{$product->selling_price}}"  class="form-control"/>
                                                </div>   
                                            </div>
                                            {{--  quantity--}}
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Quantity</label>
                                                    <input type="number" name="quantity"  value="{{$product->quantity}}" class="form-control"/>
                                                </div>   
                                            </div>
                                            {{-- trending --}}
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Trending</label>
                                                    <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked':''}} style="width: 50px; height: 50px"/>
                                                </div>   
                                            </div>
                                            {{-- status --}}
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label>Status</label>
                                                    <input type="checkbox" name="status"  {{$product->status == '1' ? 'checked':''}} style="width: 50px; height: 50px"/>
                                                </div>   
                                            </div>

                                              
                                        </div>
                                    
                                    
                                    </div>

                                    <div class="tab-pane border p-3 fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                        <div class="mb-3">
                                            <label>Upload Product Images</label>
                                            <input type="file"  name="image[]" multiple class="form-control"/>
                                        </div>
                                        <div>
                                            @if($product->productImages)
                                            <div class="row">    
                                                @foreach($product->productImages as $image)
                                                <div class="col-md-2">    
                                                    <img src="{{asset($image->image)}}" style="width: 80px; height:80px;" 
                                                    class="me-4 border" alt="Img"/>
                                                <a href="{{url('admin/productimage/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                                </div>
                                                @endforeach 
                                                 
                                            </div>    
                                                
                                            @else
                                                <h5>No Images Added</h5>
                                            @endif
                                        </div>
                                        
                                    </div> 

                                    <div class="tab-pane border p-3 fade" id="colors-tab-pane" role="tabpanel"  tabindex="0">
                                        <div class="mb-3">
                                            <h4>Add Product Color</h4>
                                            <label>Select Color</label>
                                            
                                            <div class="row">
                                                @forelse($color as $item)
                                                    <div class="col-md-3">

                                                        <div class="p-2 border mb-3">

                                                            Color : <input type="checkbox"  name="color[{{$item->id}}]" value="{{$item->id}}" />
                                                            {{$item->name}}
                                                            <br/>
                                                            Quantity : <input type="number"  name="colorquantity[{{$item->id}}]"  style="width:70px; border:1x solid" />
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-md-12">
                                                        <h1>
                                                            No colors found
                                                        </h1>
                                                    </div>
                                                @endforelse
                                                    
                                            </div>
                                            
                                        </div>
                                    <div class="table-responsive"> 

                                        <table class="table  tabele-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($product->productColors as $prodColor)
                                                    <tr class="prod-color-tr">
                                                        <td>
                                                            @if($prodColor->color)
                                                                {{$prodColor->color->name}}
                                                            @else
                                                             No Color Found
                                                            @endif     
                                                        </td>
                                                        <td>
                                                                <div class="input-group mb-3" style="width:150px">
                                                                    <input type="text" value="{{$prodColor->quantity}}" class="productColorQuantity form-control form-control-sm"/>
                                                                    <button type="button" value="{{$prodColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                                </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" value="{{$prodColor->id}}" class="btn btn-danger btn-sm text-white">Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach    
                                            </tbody>

                                        </table>


                                    </div>

                                    </div> 
                                    
                                    <div>
                                        <button  type="submit" class="btn btn-primary">
                                            Update    
                                        </button>   
                                    </div>
                                    
                                </div>
                </form>
                    {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
            </div>
        </div>   
        </div>
    </div>
</div>            
@endsection

@section('scripts')

<script>
    $(document).ready(function (){

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $(document).on('click','.updateProductColorBtn',function(){
           
          var product_id ="{{$product->id}}";
          var prod_color_id=$(this).val();
          var qty =$(this).closest('.prod-color-tr').find('.productColorQuantity').val();  
        //   alert(product_id);

          if(qty<=0){
            alert('Quantity is required');
            return false;
          }

          var data={
            'product_id':product_id,
            // 'prod_color_id':prod_color_id,
            'qty':qty
        };

        $.ajax({
            type:"POST",
            url: "/admin/product-color/"+prod_color_id,
            data: data,
            // dataType :"dataType",
            success: function (response){
                alert(response.message)
            }
        });

        

        });

    });
</script>
@endsection