<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * Get a post by its ID.
     *
     * @param int $postId
     * @return \App\Models\Post|null
     */
    public function find(int $postId)
    {
        return Post::find($postId);
    }

    /**
     * Update a post.
     *
     * @param \App\Models\Post $post
     * @param array $attributes
     * @return \App\Models\Post
     */
    public function update(Post $post, array $attributes)
    {
        $post->update($attributes);

        return $post;
    }

    /**
     * Delete a post.
     *
     * @param \App\Models\Post $post
     * @return bool
     */
    public function delete(Post $post)
    {
        return $post->delete();
    }

    /**
     * Get all posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts()
    {
        return Post::all();
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return \App\Models\Post
     */
    public function create(array $data)
    {
        return Post::create($data);
    }
}
