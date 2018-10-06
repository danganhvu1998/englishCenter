<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\register;

class clientsController extends Controller
{   
    public function __construct()
    {
		//$this->middleware('auth', ['except' => ['index', 'store', 'edit', 'editStatus']]);
		$this->middleware('auth', ['except' => ['clientMessTaker']]);
    }

    public function clientMessTaker(request $request){
        $register = new register;
        if(strlen($request->name)>50 || strlen($request->phone)>50 || strlen($request->email)>60 || strlen($request->mess)>6000){
            return "Something wrong Please try again in next 1 hours!";
        }
        $register->name = $request->name;
        $register->phone = $request->phone;
        $register->email = $request->email;
        $register->mess = $request->mess;
        $register->status = 0;
        if($register->save()){
            return "Well received! We will contact you as soon as possible.\nThank you, and have a great day with Go Languages! ";
        } else {
            return "Something wrong Please try again later!";
        }   
    }

    public function show($page){
        if($page<1) {
			return redirect('clients/1');
        }
        $clients = register::orderBy('status')
			->skip(($page-1)*15)
			->take(15)
			->get();
		if(count($clients)==0 and $page!=1){
			$pageNum = register::count();
			$pageNum = intval(($pageNum-1)/15)+1;
			return redirect('clients/'.strval($pageNum));		
		}
		$data = array(
			'clients' => $clients,
			'pageNum' => $page
		);
        return view("clientCtrl.show")->with($data);
    }

    public function resolved($id){
        $client = register::where('id', $id)->first();
        if($client==null) return redirect('clients/1');
        register::where('id', $id)
			->update([
                'status' => 1-$client->status
            ]); 
        return redirect('clients/1');
    }
    
    
}
