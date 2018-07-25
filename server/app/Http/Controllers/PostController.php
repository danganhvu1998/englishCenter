<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PostController extends Controller
{	
	#this is for take regular post
    public function index($type, $number){
		$result = post::orderBy('created_at','desc')
			->where('type', $type)
			->where('status', 0)
    		->select('title', 'sum_up', 'updated_at', 'img_url', 'id')
    		->paginate($number);
    	return $result;
    }

    #this is for posting post
    public function showStore(){
    	return view('postCtrl.store');
    }

    public function store(request $request){
		//return $request;
		$post = new post;
		//******************************** SET DEFAULT VALUE ********************************\\
		$post->status = 0;

		//******************************** SET REQUEST VALUE ********************************\\
		if(isset($request->title)) $post->title = $request->title;
		else $post->title = "GO ENGLISH";
		if(isset($request->sum_up)) $post->sum_up = $request->sum_up;
		else $post->sum_up = "GO ENGLISH";
		if(isset($request->img_url)) $post->img_url = $request->img_url;
		else $post->img_url = "img_url";
		if(isset($request->post)) $post->post = $request->post;
		else $post->post = "GO ENGLISH";
		$post->primary = (int)$request->primary;
		$post->type = (int)$request->type;
		//******************************** SET TEMPORARY VALUE ********************************\\
		$post->user_id = 1;
		//return $post;
    	//return $post->save();
    	return ["result" => $post->save()];
    }
}
/*
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
| title      | text             | YES  |     | NULL    |                |
| sum_up     | text             | YES  |     | NULL    |                |
| img_url    | text             | YES  |     | NULL    |                |
| post       | mediumtext       | NO   |     | NULL    |                |
| user_id    | int(11)          | NO   |     | NULL    |                |
| type       | int(11)          | NO   |     | NULL    |                |
| primary    | int(11)          | NO   |     | NULL    |                |
| status     | int(11)          | NO   |     | NULL    |                |
+------------+------------------+------+-----+---------+----------------+
*/