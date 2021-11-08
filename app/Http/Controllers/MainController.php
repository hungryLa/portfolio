<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        $user = auth()->user();
        return view('main',compact('user'));
    }
}
