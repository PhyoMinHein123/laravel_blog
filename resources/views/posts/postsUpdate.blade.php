@extends('base')

@section('title')
    Post Update
@endsection

@section('body')
    <div class="container">

        <h1> Post Update </h1>

        <form method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$post['title']}}" name="title" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Body</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$post['body']}}" name="body" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                <img src="{{ asset('storage/images/'.$post->image) }}" style="width: 12rem;" class="card-img-top">
                    <input type="file" name="image" class="form-control" >
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user" required>
                        @foreach($users as $user)
                            <option value="{{$user['id']}}" @if($post['user_id'] == $user['id']) selected @endif>
                                {{$user['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary"> Create </button>

        </form>
    </div>
@endsection