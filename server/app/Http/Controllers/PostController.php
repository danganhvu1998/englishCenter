<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PostController extends Controller
{	
	#this is for take regular post
    function index(){
    	$result = post::orderBy('created_at','desc')
    		->select('title', 'sum_up', 'post', 'updated_at')
    		->paginate(20);
    	return $result;
    }

    #this is for posting post
    function showStore(){
    	return view('postCtrl.store');
    }

    function store(request $request){
    	$post = new post;
    	$post->title = $request->title;
    	$post->post = $request->post;
    	$post->user_id = $request->user_id;
    	$post->primary = $request->primary;
    	$post->type = $request->type;
    	//return $post->save();
    	return ["result" => $post->save()];
    }
}

