<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::getCachedAll();

        return view('posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('posts.index')->with('success', __('messages.post_created'));
    }

    public function show(Post $post)
    {
        // Redirect back-end 'show' request to the public single blog post view
        return redirect()->route('blog.show', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::getCachedAll();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // When execution reaches this point, it means the data has passed validation from UpdatePostRequest 100%
        // Use $request->validated() to retrieve only the data defined in the rules() for updating
        $post->update($request->validated());

        return redirect()->route('posts.index')->with('success', __('messages.post_updated'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', __('messages.post_deleted'));
    }
}
