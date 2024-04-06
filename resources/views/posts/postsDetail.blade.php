@extends('base')

@section('title')
    Post Detail 
@endsection

@section('body')
    <div class="container">

        <h1> Post List </h1>

            <div class="card m-5" style="width: 800px;">
            <img src="{{ asset('storage/images/'.$post->image) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$post['title']}}</h5>
                <p class="card-text">{{$post['body']}}</p>
                <a href="/post/update/{{$post['id']}}" class="btn btn-warning">Update</a>
                <a href="/post/delete/{{$post['id']}}" class="btn btn-danger">Delete</a>
            </div>
            </div>

    </div>
@endsection