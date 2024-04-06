@extends('base')

@section('title')
    Post Create
@endsection


@section('body')
    <div class="container">

        <h1> Post Create </h1>

        <form method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Body</label>
                <div class="col-sm-10">
                    <input type="text" name="body" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user" required>
                        @foreach($users as $user)
                            <option value="{{$user['id']}}">{{$user['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary"> Create </button>

        </form>
    </div>
@endsection


