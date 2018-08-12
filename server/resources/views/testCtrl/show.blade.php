@extends('layouts.app')

@section('content')
    @if(count($tests)==0)
        <h1><strong>NO TEST RESULT YEY</strong></h1>
    @endif  
    @foreach($tests as $test)
        <div class="row">
            <div class="col-md-4">
                <strong>Created At: {{$test->created_at}}<br></strong>
                Last Edit At: {{$test->updated_at}}<br>
                <strong>Name: {{$test->name}}<br></strong>
                Phone: {{$test->phone}}<br>
                <strong>Subject: {{$test->subject}}</strong>
            </div>
            <div class="col-md-7">
                {!!$test->submisson!!}
            </div>
            <div class="col-md-1">
                @if($test->score>100)
                    <a href="/freetest/score/{{$test->id}}/0" class="btn btn-dark">Really?</a>
                    <a href="/freetest/score/{{$test->id}}/2" class="btn btn-danger">2.0-3.5</a>
                    <a href="/freetest/score/{{$test->id}}/4" class="btn btn-warning">4.0-5.5</a>
                    <a href="/freetest/score/{{$test->id}}/6" class="btn btn-primary">6.0-7.5</a>
                    <a href="/freetest/score/{{$test->id}}/8" class="btn btn-success">8.0-9.0</a>
                @endif
                @if($test->score<100)
                    @if($test->score<2)
                        <a class="btn btn-dark">Really?</a>
                    @endif
                    @if($test->score<4 and $test->score>=2)
                        <a class="btn btn-danger">2.0-3.5</a>
                    @endif
                    @if($test->score<6 and $test->score>=4)
                        <a class="btn btn-warning">4.0-5.5</a>
                    @endif
                    @if($test->score<8 and $test->score>=6)
                        <a class="btn btn-primary">6.0-7.5</a>
                    @endif
                    @if($test->score<10 and $test->score>=8)
                        <a class="btn btn-success">8.0-9.0</a>
                    @endif
                @endif
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row">
        <div class="col-lg-10 text-center">
            <a href="/freetest/1" class="btn btn-primary">1</a>
            <div class="btn-group">
                <a href="/freetest/{{$pageNum-2}}" class="btn btn-primary"><<</a>
                <a href="/freetest/{{$pageNum-1}}" class="btn btn-primary"><</a>
                <a class="btn btn-primary">Current Page: {{$pageNum}}</a>
                <a href="/freetest/{{$pageNum+1}}" class="btn btn-primary">></a>
                <a href="/freetest/{{$pageNum+2}}" class="btn btn-primary">>></a>
                <a href="/freetest/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
                <a href="/freetest/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
            </div>
        </div> 
    </div>
@endsection
