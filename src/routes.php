<?php
Route::get('/blog', function () {

    return Carawebs\Blog\Post::all();

})->name('blog');

Route::group(['middleware' => ['web']], function () {
    Route::resource('posts', 'Carawebs\Blog\Controllers\PostController');
});
