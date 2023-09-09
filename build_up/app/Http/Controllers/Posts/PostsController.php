<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public  function index()
    {
        $posts = Post::latest()->with('user', 'likes')->paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:8'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function  destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }

}
