<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientsController extends Controller
{
    public function clientMessTaker(request $request){
        return "Well received! We will contact you as soon as possible.\nThank you, and have a great day with Go English! ";
    }
}
