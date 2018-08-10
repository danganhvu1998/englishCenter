<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class freeTestController extends Controller
{
    //test
    public function ResultTaker(request $request){
        return "Well received!\nHave a great day with Go English! ";
    }
}
