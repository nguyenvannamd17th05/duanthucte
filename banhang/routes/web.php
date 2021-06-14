<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('');
Route::prefix('home')->group(function(){

});


Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'login'])->name('admins.login');
    Route::post('/',[AdminController::class,'postlogin'])->name('admins.postlogin');
    Route::get('/logout',[AdminController::class,'logout'])->name('admins.logout');
    Route::get('home',function(){
        if(Auth::check()){
            return view('home');
        }
        else{
            return redirect()->route('admins.login');
        }
    });
    Route::prefix('categories')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('categories.index')->middleware('can:category-list');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create')->middleware('can:category-add');;
        Route::post('/created',[CategoryController::class,'created'])->name('categories.created');
        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('categories.edit')->middleware('can:category-edit');;
        Route::post('edited/{id}',[CategoryController::class,'edited'])->name('categories.edited');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('categories.delete')->middleware('can:category-delete');
    });
    Route::prefix('menus')->group(function(){
        Route::get('/',[MenuController::class,'index'])->name('menus.index')->middleware('can:menu-list');
        Route::get('/create',[MenuController::class,'create'])->name('menus.create');
        Route::post('/created',[MenuController::class,'created'])->name('menus.created');
        Route::get('edit/{id}',[MenuController::class,'edit'])->name('menus.edit');
        Route::post('edited/{id}',[MenuController::class,'edited'])->name('menus.edited');
        Route::get('delete/{id}',[MenuController::class,'delete'])->name('menus.delete');
    });
    Route::prefix('products')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('products.index');
        Route::get('/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/created',[ProductController::class,'created'])->name('products.created');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('products.edit');
        Route::post('edited/{id}',[ProductController::class,'edited'])->name('products.edited');
        Route::get('delete/{id}',[ProductController::class,'delete'])->name('products.delete');
    });
    Route::prefix('silders')->group(function(){
        Route::get('/',[SliderController::class,'index'])->name('sliders.index');
        Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
        Route::post('/created',[SliderController::class,'created'])->name('sliders.created');
        Route::get('edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
        Route::post('edited/{id}',[SliderController::class,'edited'])->name('sliders.edited');
        Route::get('delete/{id}',[SliderController::class,'delete'])->name('sliders.delete');
    });
    Route::prefix('settings')->group(function(){
        Route::get('/',[SettingController::class,'index'])->name('settings.index');
        Route::get('/create',[SettingController::class,'create'])->name('settings.create');
        Route::post('/created',[SettingController::class,'created'])->name('settings.created');
        Route::get('edit/{id}',[SettingController::class,'edit'])->name('settings.edit');
        Route::post('edited/{id}',[SettingController::class,'edited'])->name('settings.edited');
        Route::get('delete/{id}',[SettingController::class,'delete'])->name('settings.delete');
    });
    Route::prefix('users')->group(function(){
        Route::get('/',[AdminUserController::class,'index'])->name('users.index');
        Route::get('/create',[AdminUserController::class,'create'])->name('users.create');
        Route::post('/created',[AdminUserController::class,'created'])->name('users.created');
        Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('users.edit');
        Route::post('edited/{id}',[AdminUserController::class,'edited'])->name('users.edited');
        Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('users.delete');
    });
    Route::prefix('roles')->group(function(){
        Route::get('/',[RoleController::class,'index'])->name('roles.index');
        Route::get('/create',[RoleController::class,'create'])->name('roles.create');
        Route::post('/created',[RoleController::class,'created'])->name('roles.created');
        Route::get('edit/{id}',[RoleController::class,'edit'])->name('roles.edit');
        Route::post('edited/{id}',[RoleController::class,'edited'])->name('roles.edited');
        Route::get('delete/{id}',[RoleController::class,'delete'])->name('roles.delete');
    });
    Route::prefix('permissions')->group(function(){

        Route::get('/create',[RoleController::class,'create_permission'])->name('permissions.create');
        Route::post('/created',[RoleController::class,'created_permission'])->name('permissions.created');

    });
});

 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
