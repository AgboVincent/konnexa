<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPostsController extends Controller
{
    public function index(User $user)
    {
        dd($user);
        $posts = $user->posts()->with('user', 'likes')->paginate(20);
        return view('users.posts.index', [
            'user' => $user,
            'posts' =>$posts
        ]);
    }
}
