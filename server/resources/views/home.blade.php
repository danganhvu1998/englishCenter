@extends('layouts.app')

@section('content')
    <h1><strong>Upload New Banner</strong></h1>
	{!! Form::open(['action' => 'FilesController@banner', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::file('file')}}
		{{Form::submit('UPLOAD (Maximum 2MB)', ['class' => 'btn btn-dark'])}}
	{!! Form::close() !!}
	<hr>
@endsection
