<?php

namespace Domain\Post\Actions;

use Domain\Post\Models\Post;

class UpdateViewCountAction
{
    public function __invoke(Post $post): Post
    {
        $post->view_count = $post->views()->count();

        $post->view_count_weekly = $post->viewsThisWeek()->count();

        $post->save();

        return $post->refresh();
    }
}
