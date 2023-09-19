 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
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

    // product route on group
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products' ,'store');

        Route::get('/products/{id}/edit','edit');

        Route::post('/products/{id}/update','update');

        Route::get('/productimage/{id}/delete','destroyImage');
        
        Route::get('/products/{id}/delete','destroyProduct');

        // AJAX
        Route::post('/product-color/{prod_color_id}','updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/delete','delProdColorQty');

    });

    Route::controller(ColorController::class)->group(function(){
        Route::get('/color', 'index');
        Route::get('/color/create','create');
        Route::post('/color/create','store');
        Route::get('/color/{id}/edit','edit');
        Route::post('/color/{id}/update','update');
        Route::get('/color/{id}/delete','delete');
    });


    // product route on group
    Route::controller(SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/store','store');
        Route::get('/sliders/{id}/edit','edit');
        Route::post('/sliders/{id}/update','update');
        Route::get('/sliders/{id}/delete','delete');
    });
 
});
