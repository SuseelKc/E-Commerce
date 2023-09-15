 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route:: get ('dashboard',[DashboardController::class, 'index']);
    // category
    Route:: get ('category',[CategoryController::class, 'index']);
    Route:: get ('category/create',[CategoryController::class, 'create']); 
    Route::post('category',[CategoryController::class,'store'])->name('category.store');
    
    Route::get('category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    
    Route::post('category/{id}/update',[CategoryController::class,'update'])->name('category.update');

    // brands
    // connecting to brand index controller made by livewire
    Route::get('/brands',App\Livewire\Admin\Brands\Index::class);

});
