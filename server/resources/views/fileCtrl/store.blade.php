@extends('layouts.app')

@section('content')
	<h1><strong>Upload New File</strong></h1>
	{!! Form::open(['action' => 'FilesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::file('file')}}
        </div>
		{{Form::submit('Post', ['class' => 'btn btn-dark'])}}
	{!! Form::close() !!}
	
@endsection
