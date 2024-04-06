@extends('base')

@section('title')
    Post List 
@endsection

@section('body')
    <div class="container">

        <h1> Post List </h1>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>

        <div class="row justify-content-center">
        @foreach($posts as $post)
            <div class="card my-3 mx-2 col-12 col-sm-6 col-md-4 col-lg-3">
            <img src="{{ asset('storage/images/'.$post->image) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$post['title']}}</h5>
                <p class="card-text">{{$post['body']}}</p>
                <a href="/post/detail/{{$post['id']}}" class="btn btn-primary">Detail</a>
            </div>
            </div>
        @endforeach
        </div>

    </div>
@endsection