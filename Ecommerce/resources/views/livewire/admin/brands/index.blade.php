
<div>
    


    @include('livewire.admin.brands.modal-form')

   <div class="row">
    <div class="col-md-12">
        <div card="card">
            <div class="card-header">
                <h4>
                    Brands List
                    <a href="#" data-bs-toggle="modal" data-bs-target="#brandModal" class="btn btn-primary  text-white btn-sm float-end"> Add Brands</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->slug}}</td>
                            <td>{{$brand->status== "1" ?'hidden':'visible'}}</td>
                            <td>
                                <a href="#" 
                                wire:click="editBrand({{ $brand->id}})" 
                                data-bs-toggle="modal" data-bs-target="#editbrandModal" class="btn btn-sm  btn-success">Edit</a>
                                <a href="#"
                                wire:click="deleteBrands({{$brand->id}})"  
                                data-bs-toggle="modal" data-bs-target="#deletebrandModal" 
                                class="btn btn-sm  btn-danger">Delete</a>
                    
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No brands Found</td>
                        </tr>
                        
                        
                        
                        @endforelse
                        
                        
                    </tbody>
                </table>
                <div>
                    {{$brands->links()}}
                </div>
            
            </div>
        </div>
    </div>
    </div>

        
    
</div>
@push('script')
<script>
   window.addEventListner('close-modal',event=>{
    $('#brandModal').modal('hide');
    $('#editbrandModal').hide();
    $('#deletebrandModal').hide();
   });
</script>

@endpush
