<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostsPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
