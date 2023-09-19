@extends('layouts.admin')


@section('content')
      @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif  

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
        <div class="card-header">
            <h3>Edit Slider
                <a href="{{url('admin/sliders')}}" class="btn btn-primary btn-sm  text-white float-end">Back</a>
            </h3>
        </div>
            <div class="card-body">
              <form 
              action="{{url('admin/sliders/'.$slider->id.'/update')}}" 
              method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$slider->title}}" class="form-control"/>
                    </div>   

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea  name="description" value=""  class="form-control" row="3">{{$slider->description}}</textarea>
                    </div> 

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" value="" class="form-control"/>
                        <img src="{{asset('/uploads/slider',$slider->image)}}"/>
                    </div>

                    <div class="mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" name="status"  {{$slider->status=='1'? 'checked':''}} style="width:30px;height:30px"/> 
                        Checked=Hidden, Unchecked=Visible
                    </div> 

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div> 

              </form>
                
            </div>   
        </div>
    </div>
</div>            

@endsection 