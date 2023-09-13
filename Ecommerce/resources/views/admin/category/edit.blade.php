@extends('layouts.admin')


@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-sucess">
            {{session('message')}}
        </div>
        @endif
        <div class="card">
        <div class="card-header">
            <h3>Edit Category
                <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm  text-white float-end">Back</a>
            </h3>
        </div>
            <div class="card-body">
                <form action="
                {{-- {{route('category.update',$category->id)}} --}}
                {{url('admin/category/'.$category->id.'/update')}}
                " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3">
                             <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
                            @error('name') <small class="text-danger">{{$message}}</small>
                            @enderror    
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Slug</label>
                           <input type="text" name="slug" class="form-control" value="{{$category->slug}}"/>
                           @error('slug') <small class="text-danger">{{$message}}</small>
                            @enderror      
                       </div>
                       <div class="col-md-6 mb-3">
                            <label>Description</label>
                            <textarea type="description" name="description" class="form-control" rows="3" >{{$category->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small>
                            @enderror   
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Image</label>
                           <input type="file" name="image" class="form-control"/>
                           <img src="{{asset('/uploads/category',$category->image)}}"/>
                           @error('image') <small class="text-danger">{{$message}}</small>
                           @enderror   
                       </div>
                       <div class="col-md-6 mb-3">
                            <label>Status</label><br/>
                            <input type="checkbox" name="status"  {{$category->status == '1' ? 'checked' : ''}}/>    
                            @error('status') <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <br>
                        <div>
                            <h3>SEO Tags</h3>
                        </div>
                        <br> <br>
                        <div class="col-md-12 mb-3">
                            <label>Meta Title</label>
                           <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}" />
                           @error('meta_title') <small class="text-danger">{{$message}}</small>
                            @enderror
                               
                       </div>
                       <div class="col-md-12 mb-3">
                        <label>Meta Keyword</label>
                       {{-- <input type="file" name="name" class="form-control"/>     --}}
                        <textarea name="meta_keyword" class="form-control" rows="3" value="" >{{$category->meta_keyword}}</textarea> 
                        @error('meta_keyword') <small class="text-danger">{{$message}}</small>
                        @enderror
                              
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Meta Description</label>
                           <textarea name="meta_description" class="form-control" rows="3" value="">{{$category->meta_description}}</textarea>
                           @error('meta_description') <small class="text-danger">{{$message}}</small>
                        @enderror    
                       </div>

                       <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary text-white float-end">Update</button>    
                       </div>
                       


                    </div>
                
                </form>   

            </div>

        </div>
    </div>
</div>  

@endsection