<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Request;


class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post, Request $request)
    {
        if($post->likedBy($request->user())){
            return response(null, 400);
        }
       $post->likes()->create([
           'user_id' => $request->user()->id
       ]);
       return back();
    }
    public function destroy(Post $post, Request $request)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete;
        return back();
    }
}
