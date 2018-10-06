@extends('layouts.app')

@section('content')
	<h1><strong>Upload New File</strong></h1>
	{!! Form::open(['action' => 'FilesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::file('file')}}
		{{Form::submit('UPLOAD (Maximum 2MB)', ['class' => 'btn btn-dark'])}}
	{!! Form::close() !!}
	<hr>

	<!--End Form, Stast list-->
	@if(count($files)==0)
        <h1><strong>NO files HERE</strong></h1>
	@endif

	@foreach($files as $file)
        <div class="row">
            <div class="col-md-4">
				<a href='/storage/file/{{$file->file_url}}'>
					<img height="150" width="200" src='/storage/file/{{$file->file_url}}' alt='{{$file->file_url}}'>
				</a>
			</div>
			<div class="col-md-7">
				http://golanguages.edu.vn:8000/storage/file/{{$file->file_url}}
			</div>
			<div class="col-md-1">
				<a href="/api/files/delete/{{$file->id}}">
					<button class="btn btn-primary">delete</button>
				</a>
			</div>
        </div>
        <hr>
	@endforeach
	<div class="row">
		<div class="col-lg-10 text-center">
			<a href="/files/store/1" class="btn btn-primary">1</a>
			<div class="btn-group">
				<a href="/files/store/{{$pageNum-2}}" class="btn btn-primary"><<</a>
				<a href="/files/store/{{$pageNum-1}}" class="btn btn-primary"><</a>
				<a class="btn btn-primary">Current Page: {{$pageNum}}</a>
				<a href="/files/store/{{$pageNum+1}}" class="btn btn-primary">></a>
				<a href="/files/store/{{$pageNum+2}}" class="btn btn-primary">>></a>
				<a href="/files/store/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
				<a href="/files/store/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
			</div>
		</div>
	</div>

@endsection
