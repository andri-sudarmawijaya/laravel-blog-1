<?php
// Route::get('/blog', function () {
//     return Carawebs\Blog\BlogPost::all();
// })->name('blog');

Route::group(['middleware' => ['web']], function () {

    // Route::post('/posts', function() {
    //     return "Hello";
    // });
    Route::resource('posts', 'Carawebs\Blog\Controllers\PostController');

    Route::get('/home', function() {
        $user = Auth::user();
        return view('blog::welcome', compact('user'));
    });
    Route::post('/avatars', 'Carawebs\Blog\Controllers\ImageController@imageUploadPost');
});
