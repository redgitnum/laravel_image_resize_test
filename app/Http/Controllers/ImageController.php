<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image'
        ]);
        $path = $request->file->store('public/images');
        return redirect()->route('image.options', [
            'image' => $path
        ]);
        
    }

    public function options($image)
    {
        return view('process', [
            'image' => Storage::url($image),
            'imageData' => $image
        ]);
    }

    public function process(Request $request, $imageData)
    {
        $image = Storage::get($imageData);
        $filename = Str::beforeLast(Str::afterLast($imageData, '/'), '.');
        $ext = Str::afterLast($imageData, '.');
        Image::make($image)->resize($request->width, $request->height)->save('storage/images/'.$filename.'resize.'.$ext);
        return redirect('/');
    }
}
