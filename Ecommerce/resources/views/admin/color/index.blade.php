@extends('layouts.admin')


@section('content')
      @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif  

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
        <div class="card-header">
            <h3>Colors List
                <a href="{{url('admin/color/create')}}" class="btn btn-primary btn-sm  text-white float-end">Add Colors</a>
            </h3>
        </div>
            <div class="card-body">
                
            </div>   
        </div>
    </div>
</div>            

@endsection