@extends('layouts.app')

@section('content')
    @if(count($posts)==0)
        <h1><strong>NO POST HERE</strong></h1>
    @endif
    @if(count($posts)>0)
        @if($posts[0]->status==0)
            <h1><strong>PENDING POST</strong></h1>
        @endif
        @if($posts[0]->status==1)
            <h1><strong>POSTED POST</strong></h1>
        @endif
    @endif    
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-3">
                <a href="/posts/edit/{{$post->id}}">
                    <img height="150" width="150"  src='{{$post->img_url}}'>
                </a>
            </div>
            <div class="col-md-8">
                <h4>{{$post->title}}</h4><br>
                <p>{{$post->sum_up}}</p>
            </div>
            <div class="col-md-1">
                <div class="row">
                    <a href="/posts/edit/{{$post->id}}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>  
                <hr>  
                <div class="row">
                    <a href="/api/posts/editStatus/{{$post->id}}">
                        <button class="btn btn-primary">on/off</button>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection
