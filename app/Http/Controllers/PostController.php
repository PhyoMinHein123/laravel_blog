<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostModel;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index(Request $request){

        $posts =  PostModel::query()->when($request->search, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
                // ->OrWhere('content', 'like', '%' . $search . '%');
        })->latest()->paginate(6)->withQueryString();

        return view('posts.postsList',['posts'=>$posts]);
    }

    public function show($id){
        $post = PostModel::find($id);
        return view('posts.postsDetail',['post'=>$post]);
    }

    public function create(){
        $users = User::all();
        return view('posts.postsCreate',['users'=>$users]);
    }

    public function add(Request $request){

        $fileName = time() . '.' . Request()->image->extension();
        $request->image->storeAs('public/images', $fileName);

        $users = new PostModel;
        $users->title = Request()->title;
        $users->body = Request()->body;
        $users->image = $fileName;
        $users->user_id = Request()->user;
        $users->save();
        return redirect('/post/list')->with('info','Post Created Success!');

    }

    public function delete($id){
        $post = PostModel::find($id);
        $post->delete();
        return redirect('/post/list')->with('info','Post Deleted Success!');
    }


    public function update($id){
        $users = User::all();
        $post = PostModel::find($id);
        return view('posts.postsUpdate',['post'=>$post,'users'=>$users]);
    }

    public function change(Request $request, $id){
        $post = PostModel::find($id);
        $post->title = Request()->title;
        $post->body = Request()->body;
        if(Request()->image){
            $fileName = time() . '.' . Request()->image->extension();
            $request->image->storeAs('public/images', $fileName);
            $post->image = $fileName;
        }
        $post->user_id = Request()->user;
        $post->save();
        return redirect('/post/list')->with('info','Post Updated Success!');
    }

}