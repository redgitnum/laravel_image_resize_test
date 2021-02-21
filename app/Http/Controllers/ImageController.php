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
        $originalFileName = Str::beforeLast($request->file->getClientOriginalName(), '.');
        $originalFileExtension = $request->file->getClientOriginalExtension();
        $image = Image::make($request->file);
        if(!is_dir('storage/images/'.$originalFileName)){
            mkdir('storage/images/'.$originalFileName, 0777, true);
        }
        $image->backup();
        $image->save('storage/images/'.$originalFileName.'/'.$originalFileName.'.'.$originalFileExtension);
        $image->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save('storage/images/'.$originalFileName.'/'.$originalFileName.'-600.'.$originalFileExtension);
        $image->reset();
        $image->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save('storage/images/'.$originalFileName.'/'.$originalFileName.'-400.'.$originalFileExtension);
        $image->reset();
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save('storage/images/'.$originalFileName.'/'.$originalFileName.'-200.'.$originalFileExtension);

        return redirect()->route('view', [
            'image' => $originalFileName
        ]);
        
    }

    public function view($image)
    {
        // $images = Storage::files('public/images/'.$image);
        $images = collect(Storage::files('public/images/'.$image))->map(function($file) {
            return Storage::url($file);
        });
        return view('resized', [
            'images' => $images
        ]);
    }
}
