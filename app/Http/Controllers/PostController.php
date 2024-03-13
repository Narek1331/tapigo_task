<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAndUpdatePostRequest;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Get a list of all posts.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();

        return PostResource::collection($posts);
    }

    /**
     * Get a specific post.
     *
     * @param int $postId
     * @return \App\Http\Resources\PostResource|\Illuminate\Http\JsonResponse
     */
    public function show($postId)
    {
        $post = $this->postService->getPost($postId);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return new PostResource($post);
    }

    /**
     * Store a new post.
     *
     * @param \App\Http\Requests\StoreAndUpdatePostRequest $request
     * @return \App\Http\Resources\PostResource|\Illuminate\Http\JsonResponse
     */
    public function store(StoreAndUpdatePostRequest $request)
    {
        $validatedData = $request->validated();

        $post = $this->postService->createPost($validatedData);

        return new PostResource($post);
    }

    /**
     * Update a specific post.
     *
     * @param \App\Http\Requests\StoreAndUpdatePostRequest $request
     * @param int $postId
     * @return \App\Http\Resources\PostResource|\Illuminate\Http\JsonResponse
     */
    public function update(StoreAndUpdatePostRequest $request, $postId)
    {
        $validatedData = $request->validated();

        $post = $this->postService->updatePost($postId, $validatedData);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return new PostResource($post);
    }

    /**
     * Delete a specific post.
     *
     * @param int $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($postId)
    {
        $deleted = $this->postService->deletePost($postId);

        if (!$deleted) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
