<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\freeTest;

class freeTestController extends Controller
{
    //test
    public function testResultTaker(request $request){
        //name, phone, subject, submission
        $freeTest = new freeTest;
        $freeTest->name = $request->name;
        $freeTest->phone = $request->phone;
        $freeTest->subject = $request->subject;
        $freeTest->submisson = $request->submission;
        $freeTest->score = 200;
        if($freeTest->save()){
            return "Well received! Have a great day with Go Language! ";
        } else {
            return "Something wrong Please try again later!";
        }
    }
}
