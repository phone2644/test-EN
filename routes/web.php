<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\Admincontroler;
use App\Http\Controllers\BlogController;

//นักอ่าน
Route::get('/',[BlogController::class,'index']);
Route::get('/detail/{id}',[BlogController::class,'detail']);
Route::get('/dashbord', function () {
    return view('dashbord'); 
})->name('dashbord');
//author
Route::prefix('author')->group(function(){
    Route::get('about', [Admincontroler::class,'about'])->name('about');
    Route::get('create', [Admincontroler::class,'create']);
    Route::post('insert',[Admincontroler::class,'insert']);
    Route::get('blog',[Admincontroler::class,'index'])->name('blog');
    Route::get('delete/{id}',[Admincontroler::class,'delete'])->name('delete');
    Route::get('change/{id}',[Admincontroler::class,'change'])->name('change');
    Route::get('edit/{id}',[Admincontroler::class,'edit'])->name('edit');
    Route::post('update/{id}',[Admincontroler::class,'update'])->name('update');
});

Route::fallback(function () {
    return view('fallweb');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
