<?php


use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index']);
Route::get('article/{subject_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewSubjectPost']);
Route::get('article/{subject_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class,'viewPost']);


Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){

    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('subject',[App\Http\Controllers\Admin\SubjectController::class,'index']);
    Route::get('add-subject',[App\Http\Controllers\Admin\SubjectController::class,'create']);
    Route::post('add-subject',[App\Http\Controllers\Admin\SubjectController::class,'store']);
    Route::get('edit-subject/{category_id}',[App\Http\Controllers\Admin\SubjectController::class,'edit']);
    Route::put('update-subject/{category_id}',[App\Http\Controllers\Admin\SubjectController::class,'update']);
    Route::get('delete-subject/{category_id}',[App\Http\Controllers\Admin\SubjectController::class,'destroy']);


    Route::get('post',[App\Http\Controllers\Admin\PostController::class,'index']);
    Route::get('add-post',[App\Http\Controllers\Admin\PostController::class,'create']);
    Route::post('add-post',[App\Http\Controllers\Admin\PostController::class,'store']);
    Route::get('post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit']);
    Route::put('update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update']);
    Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'destroy']);

    Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
    Route::get('user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
