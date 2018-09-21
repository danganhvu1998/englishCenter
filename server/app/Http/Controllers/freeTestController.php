<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\freeTest;
use App\register;


class freeTestController extends Controller
{   
    public function __construct()
    {
		//$this->middleware('auth', ['except' => ['index', 'store', 'edit', 'editStatus']]);
		$this->middleware('auth', ['except' => ['testResultTaker']]);
    }
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

    public function show($page){
        if($page<1) {
			return redirect('freetest/1');
        }
        $tests = freeTest::orderBy('score', 'desc')
			->skip(($page-1)*10)
			->take(10)
			->get();
		if(count($tests)==0 and $page!=1){
			$pageNum = freeTest::count();
			$pageNum = intval(($pageNum-1)/10)+1;
			return redirect('freetest/'.strval($pageNum));		
		}
		$data = array(
			'tests' => $tests,
			'pageNum' => $page
		);
        return view("testCtrl.show")->with($data);
    }

    public function score(request $request){
        $id = $request->testID;
        $score = $request->score;
        $note = $request->note;
        freeTest::where('id', $id)
			->update([
                'score' => (int)$score,
                'note' => $note
            ]); 
        
        $test = freeTest::where('id', $id)->first();
        if( $test->subject =="speaking" or $test->subject =="writing"){
            $register = new register;
            $register->name = $test->name;
            $register->phone = $test->phone;
            $register->email = "No Information";
            $register->mess = "Auto message from Test Result. Subject = ".$test->subject."; Score is ".$score."; With note: ".$note;
            $register->status = 0;
            $register->save();
        }
        return redirect('freetest/1');
    }
}
