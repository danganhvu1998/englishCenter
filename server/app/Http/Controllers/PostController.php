<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PostController extends Controller
{	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		//$this->middleware('auth', ['except' => ['index', 'store', 'edit', 'editStatus']]);
		$this->middleware('auth', ['except' => ['index', 'showPostContent']]);
    }
	
	//******************************** WEB ********************************\\
    #this is for posting post
    public function showStore(){
    	return view('postCtrl.store');
	}
	
	public function showEdit($id){
		$post = post::where('id', $id)->first();
		return view('postCtrl.edit')->with('post', $post);
	}

	public function showIndex($status, $page){
		if($page<1) {
			return redirect('posts/show/'.strval($status).'/1');
        }
		$posts = post::orderBy('updated_at','desc')
			->where('status', $status)
			->skip(($page-1)*10)
			->take(10)
			->get();
		if(count($posts)==0 and $page!=1){
			$pageNum = post::where('status', $status)->count();
			$pageNum = intval(($pageNum-1)/10)+1;
			return redirect('posts/show/'.strval($status).'/'.strval($pageNum));		
		}
		$data = array(
			'posts' => $posts,
			'status' => $status,
			'pageNum' => $page
		);
		//return $data;
		return view('postCtrl.index')->with($data);
	}








	//******************************** API ********************************\\
	#this is for taking status=1 post
    public function index($type, $number, $page){
		$result = post::orderBy('primary','desc')
			->orderBy('created_at','desc')
			->where('type', $type)
			->where('status', 1)
    		->select('title', 'sum_up', 'created_at', 'img_url', 'id', 'primary')
    		->skip(($page-1)*$number)
			->take($number)
			->get();
    	return $result;
    }
	
	#this is for saving new post
    public function store(request $request){
		//return $request;
		$post = new post;
		//******************************** SET DEFAULT VALUE ********************************\\
		$post->status = 0;//default auto post, can turn off later

		//******************************** SET REQUEST VALUE ********************************\\
		if(isset($request->title)) $post->title = $request->title;
		else $post->title = "GO ENGLISH";
		if(isset($request->sum_up)) $post->sum_up = $request->sum_up;
		else $post->sum_up = "GO ENGLISH";
		if(isset($request->img_url)) $post->img_url = $request->img_url;
		else $post->img_url = "http://kyatod.science/goenglish/img/about/4.jpg";
		if(isset($request->post)) $post->post = $request->post;
		else $post->post = "GO ENGLISH";
		$post->primary = (int)$request->primary;
		$post->type = (int)$request->type;
		//******************************** SET TEMPORARY VALUE ********************************\\
		$post->user_id = 1;
		$post->save();
		//return $post;
		//return $post->save();
		return redirect('posts/show/0/1');
	}
	
	#this is for editing post
	public function edit(request $request){
		$post = post::where('id', $request->id)->first();
		if($post==null){
			return ["result"=>0, "error"=>"Cannot find post"];
		}
		post::where('id', $request->id)
			->update([
				'title' => $request->title,
				'sum_up' => $request->sum_up,
				'img_url' => $request->img_url,
				'post' => $request->post,
				'primary' => $request->primary,
				'type' => $request->type
			]);
		if($post->status==0) return redirect('posts/show/0/1');
		return redirect('posts/show/1/1');
	}

	public function editStatus($id){
		$post = post::where('id', $id)->first();
		post::where('id', $id)
			->update([
				'status' => 1-$post->status
			]);
		//return 1;
		if($post->status==0) return redirect('posts/show/1/1');
		return redirect('posts/show/0/1');
	}

	public function showPostContent($id){
		$post = post::where('id', $id)
			->select('updated_at', 'title', 'sum_up', 'img_url', 'post')
			->first();
		return $post;
	}
}
/*
+------------+------------------+------+-----+---------+----------------+
| Field      | Type             | Null | Key | Default | Extra          |
+------------+------------------+------+-----+---------+----------------+
| id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| updated_at | timestamp        | YES  |     | NULL    |                |
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