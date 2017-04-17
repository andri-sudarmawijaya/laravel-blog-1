<?php
Route::get('/blog', function () {
    return Carawebs\Blog\Post::all();
})->name('blog');

Route::group(['middleware' => ['web']], function () {
    Route::resource('posts', 'Carawebs\Blog\Controllers\PostController');
    Route::get('/home', function() {
        $user = Auth::user();
        return view('blog::welcome', compact('user'));
    });
    Route::post('/avatars', 'Carawebs\Blog\Controllers\ImageController@imageUploadPost');//function() {
        // // defaults
        // //request()->file('avatar')->store('avatars', 's3');
        // $file = request()->file('avatar');
        // $ext = $file->guessClientExtension();
        // $path = $file->storeAs('avatars/' . Auth::user()->id, "avatar.$ext", 's3');
        // return back();
        // ---------------------------------------------------------------------
    //});
});
