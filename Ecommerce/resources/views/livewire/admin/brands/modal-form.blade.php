@if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
          <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Brand Name</label>
                        <input type="text"  wire:model.defer="name" class="form-control">
                        @error('name')<small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug')<small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" wire:model.defer="status">
                        @error('status')<small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-white">Save </button>
                </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="editbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brands</h1>
        <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden"></span>
        </div>Loading...
      </div>

  <div wire:loading.remove>
      <form wire:submit.prevent="updateBrand">

              <div class="modal-body">
                  <div class="mb-3">
                      <label>Brand Name</label>
                      <input type="text"  wire:model.defer="name" class="form-control">
                      @error('name')<small class="text-danger">{{$message}}</small> @enderror
                  </div>
                  <div class="mb-3">
                      <label>Brand Slug</label>
                      <input type="text" wire:model.defer="slug" class="form-control">
                      @error('slug')<small class="text-danger">{{$message}}</small> @enderror
                  </div>
                  <div class="mb-3">
                      <label>Status</label><br/>
                      <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;">
                      @error('status')<small class="text-danger">{{$message}}</small> @enderror
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary text-white">Update </button>
              </div>

      </form>
  </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="deletebrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
        <button type="button" class="btn-close"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div wire:loading class="p-2">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden"></span>
        </div>Loading...
      </div>

  <div wire:loading.remove>
      <form wire:submit.prevent="destroyBrand">

            <div class="modal-body">
                      <h4>Are you sure you want to delete?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger text-white">Delete</button>
            </div>

      </form>
  </div>
    </div>
  </div>
</div>