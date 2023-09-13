<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    { 
        // dd("here");
        $categories =Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',compact('categories'));
    }
}
