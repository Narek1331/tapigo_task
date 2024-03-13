<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get a post by its ID.
     *
     * @param int $postId
     * @return \App\Models\Post|null
     */
    public function getPost(int $postId)
    {
        return $this->postRepository->find($postId);
    }

    /**
     * Update a post.
     *
     * @param int $postId
     * @param array $attributes
     * @return \App\Models\Post
     */
    public function updatePost(int $postId, array $attributes)
    {
        $post = $this->postRepository->find($postId);

        if (!$post) {
            return null;
        }

        return $this->postRepository->update($post, $attributes);
    }

    /**
     * Delete a post.
     *
     * @param int $postId
     * @return bool
     */
    public function deletePost(int $postId)
    {
        $post = $this->postRepository->find($postId);

        if (!$post) {
            return false;
        }

        return $this->postRepository->delete($post);
    }

     /**
     * Get all posts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return \App\Models\Post
     */
    public function createPost(array $data)
    {
        return $this->postRepository->create($data);
    }
}
