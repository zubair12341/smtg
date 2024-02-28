<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePagesController extends Controller
{
    public function search(){
        return view('mainpages.search');
    }

    public function hotels(){
        return view('mainpages.hotels');
    }
}
