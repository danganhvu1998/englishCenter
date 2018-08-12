@extends('layouts.app')

@section('content')
    @if(count($clients)==0)
        <h1><strong>NO REGISTER YET</strong></h1>
    @endif  
    @foreach($clients as $client)
        <div class="row">
            <div class="col-md-4">
                <strong>Created At: {{$client->created_at}}<br></strong>
                Last Edit At: {{$client->updated_at}}<br>
                <strong>Name: {{$client->name}}<br></strong>
                Email: {{$client->email}}<br>
                <strong>Phone: {{$client->phone}}<br></strong>
            </div>
            <div class="col-md-7">
                Message: {{$client->mess}}
            </div>
            <div class="col-md-1">
                @if($client->status==0)
                    <a href="/clients/resolved/{{$client->id}}" class="btn btn-danger">!!Not Yet!!</a>
                @endif
                @if($client->status==1)
                    <a href="/clients/resolved/{{$client->id}}" class="btn btn-primary">Resolved</a>
                @endif
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row">
        <div class="col-lg-10 text-center">
            <a href="/clients/1" class="btn btn-primary">1</a>
            <div class="btn-group">
                <a href="/clients/{{$pageNum-2}}" class="btn btn-primary"><<</a>
                <a href="/clients/{{$pageNum-1}}" class="btn btn-primary"><</a>
                <a class="btn btn-primary">Current Page: {{$pageNum}}</a>
                <a href="/clients/{{$pageNum+1}}" class="btn btn-primary">></a>
                <a href="/clients/{{$pageNum+2}}" class="btn btn-primary">>></a>
                <a href="/clients/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
                <a href="/clients/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
            </div>
        </div> 
    </div>
@endsection
