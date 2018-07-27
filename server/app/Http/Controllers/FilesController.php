<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\files;

class FilesController extends Controller
{
    public function showStore(){
        return view('fileCtrl.store');
    }

    public function store(request $request){
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $file = new files;
        $file->file_url = '/storage/file/'.$fileNameToStore;
        $file->save();
        return redirect('posts/show/0/1');
    }
}
