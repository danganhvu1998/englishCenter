<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\register;

class clientsController extends Controller
{
    public function clientMessTaker(request $request){
        $register = new register;
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->email = $request->email;
        $register->mess = $request->mess;
        $register->status = 0;
        if($register->save()){
            return "Well received! We will contact you as soon as possible.\nThank you, and have a great day with Go Language! ";
        } else {
            return "Something wrong Please try again later!";
        }   
    }

    public function show(){
        
    }
}
