@extends('layouts.admin')


@section('content')
      @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
      @endif  

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
        <div class="card-header">
            <h3>Products
                <a href="{{url('admin/products/create')}}" class="btn btn-primary btn-sm  text-white float-end">Add Products</a>
            </h3>
        </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr> 
                        <th>ID</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>

                            <td>
                                @if($item->category)
                                {{$item->category->name}}
                                @else
                                No Category
                                @endif
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/products/'.$item->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{url('admin/products/'.$item->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>   

                        @empty
                        <tr>
                            <td colspan="7">NO products Available</td>
                        </tr> 
                            
                        @endforelse
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
</div>            

@endsection