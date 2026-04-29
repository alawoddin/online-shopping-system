<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

///User Route
Route::middleware(['auth' ,IsUser::class ])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


});

//End User Route

///Admin Route
Route::prefix('admin')->middleware(['auth' ,IsAdmin::class ])->group(function () {


Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');


    Route::controller(HomeController::class)->group(function () {
        Route::get('/all/home' , "AllHome")->name('all.home');
        Route::get('/add/home' , "AddHome")->name('add.home');
        Route::post('/home/store', 'StoreHome')->name('store.home');
        Route::get('edit/home/{id}', 'EditHome')->name('edit.home');
        Route::post('/update/home/{id}', 'UpdateHome')->name('update.home');
        Route::get('delete/home/{id}', 'DeleteHome')->name('delete.home');

    });

     Route::controller(HomeController::class)->group(function () {
        Route::get('/all/feature' , "AllFeature")->name('all.feature');
        Route::get('/add/feature' , "AddFeature")->name('add.feature');
        Route::post('/feature/store', 'StoreFeature')->name('store.feature');
        Route::get('edit/feature/{id}', 'EditFeature')->name('edit.feature');
        Route::post('/update/feature/{id}', 'UpdateFeature')->name('update.feature');
        Route::get('delete/feature/{id}', 'DeleteFeature')->name('delete.feature');

    });

// brand start
     Route::controller(HomeController::class)->group(function () {
        Route::get('/all/brand' , "AllBrand")->name('all.brand');
        Route::get('/add/brand' , "AddBrand")->name('add.brand');
        Route::post('/brand/store', 'StoreBrand')->name('store.brand');
        Route::get('edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::post('/update/feature/{id}', 'UpdateFeature')->name('update.feature');
        Route::get('delete/feature/{id}', 'DeleteFeature')->name('delete.feature');

    });

    // brand start
     Route::controller(HomeController::class)->group(function () {
        Route::get('/all/product' , "AllProduct")->name('all.product');
        Route::get('/add/product' , "AddProduct")->name('add.product');
        Route::post('/brand/product', 'StoreProduct')->name('store.product');
        Route::get('edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/feature/{id}', 'UpdateFeature')->name('update.feature');
        Route::get('delete/feature/{id}', 'DeleteFeature')->name('delete.feature');

    });


});

//End Admin  Route 









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
  