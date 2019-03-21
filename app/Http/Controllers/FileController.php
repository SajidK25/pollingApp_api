<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show(){
        return response()->download(storage_path('App/GraceHopper.pdf','Awesome Grace'));
    }
    public function create(Request $req){
        $path=$req->file('photo')->store('testing');
        return response()->json(['path'=>$path,200]);
    }
}
