<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::group(['namespace'=>'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts/create', 'StoreController')->name('post.store');

    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

    //Route::delete('/main', 'MainController@index')->name('main.delete');

});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});


Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contact.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/mypage', 'App\Http\Controllers\MypageController@index')->name('mypage.index');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
