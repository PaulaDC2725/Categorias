<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
// use Illuminate\Support\Facades\DB;
use App\Models\Product;
/*ss
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', function ($id) {
    return 'El id es: '.$id;
});

Route::get('/form/{id?}', [PersonaController::class , 'mostarForm']
)->where('id', '[0-9]+');

// Return data without implementing the model

/* Route::get('/products', function () {
    $products = DB::table('product')->get();
    return dd($products);
}); */

/* Route::get('/products', function () {
    $products = Product::get();
    return dd($products);
});  */
Route::get('/categorias', [CategoriaController::class , 'ShowCategorias'])->name('ShowCategorias');
Route::get('/categoria/create/{id?}', [CategoriaController::class , 'create'])->name('categoria.create');
Route::post('categoria/save}', [CategoriaController::class , 'store'])->name('categoria.store');
Route::get('/categoria/delete/{id}', [CategoriaController::class , 'delete'])->name('prodDelete');

Route::get('/brands', [BrandController::class , 'ShowBrands'])->name('ShowBrands');
Route::get('/brand/create/{id?}', [BrandController::class , 'create'])->name('brand.create');
Route::post('brand/save}', [BrandController::class , 'store'])->name('brand.store');
Route::get('/brand/delete/{id}', [BrandController::class , 'delete'])->name('prodDelete');


Route::get('/products', [ProductController::class , 'ShowProducts'])->name('ShowProducts');


//-----Codigo profesor----
Route::get('/product/create/{id?}', [ProductController::class , 'create'])->name('product.create');
Route::post('product/save}', [ProductController::class , 'store'])->name('product.store');

//-----Autonomo------
/*Route::get('/product/create', function () {
    return view('product.create');
});*/

Route::get('/product/delete/{id}', [ProductController::class , 'delete'])->name('prodDelete');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('file-import-export', [ProductController::class, 'fileImportExport']);
Route::get('file-export', [ProductController::class, 'fileExport'])->name('file-export');
