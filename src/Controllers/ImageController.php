<?php

namespace Carawebs\Blog\Controllers;

use Auth;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function imageUploadPost (Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = request()->file('avatar');
        $ext = $file->guessExtension();
        $path = $file->storeAs('avatars/' . Auth::user()->id, "avatar.$ext", 's3');
        $path = Storage::disk('s3')->url($path);
        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$path);


        // $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
        // $image = $request->file('avatar');
        // $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        // $imageName = Storage::disk('s3')->url($imageName);
        // return back()
        // ->with('success','Image Uploaded successfully.')
        // ->with('path',$imageName);
    }
}
