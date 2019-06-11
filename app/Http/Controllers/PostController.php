<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    
   


    public function index(Request $request){
        $posts = Post::all();
        return view('common.posts.index', compact('posts'));
    }
    public function show(Request $request){}
    public function store(Request $request){

        $post = new Post;
        $post->user_id = $request->user_id;
        $post->user_type = $request->user_type;
        $post->title = $request->title;
        $post->content = $request->description;
        $post->save();

        return redirect()->route('posts.index');
        
    }
    public function create(Request $request){
        return view('common.posts.create');
    }
    public function update(Request $request){}
    public function destroy(Request $request){}


    
}