<?php
use Intervention\Image\ImageManager;

Route::group(['middleware' => ['web']], function () {

    Route::resource('posts', 'Carawebs\Blog\Controllers\PostController');

    Route::get('/home', function() {
        $user = Auth::user();
        try {
            $manager = new ImageManager();
            $img = "https://s3-eu-west-1.amazonaws.com/carawebs-test-laravel/avatars/$user->id/avatar.jpg";
            $img = $manager->make($img)->resize(300, NULL, true);
        } catch(Intervention\Image\Exception\NotReadableException $e) {
            $img = $e;
        }
        return view('blog::welcome', compact('img','user'));
    });
    Route::post('/avatars', 'Carawebs\Blog\Controllers\ImageController@imageUploadPost');
});
