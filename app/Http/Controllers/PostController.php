<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Tutorial Concept: Controllers
 *
 * Controllers are responsible for handling incoming HTTP requests and
 * returning a response. This is a resourceful controller that handles
 * all CRUD (Create, Read, Update, Delete) operations for blog posts.
 *
 * Resource controllers follow RESTful conventions and map HTTP verbs to
 * controller methods automatically when using Route::resource().
 */
class PostController extends Controller
{
    /**
     * Display a listing of posts.
     *
     * Tutorial: The index method handles GET /posts
     * It retrieves all posts from the database and passes them to a view.
     */
    public function index(): View
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * Tutorial: The create method handles GET /posts/create
     * It returns a view with a form to create a new post.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in the database.
     *
     * Tutorial: The store method handles POST /posts
     * It validates incoming data and saves a new post to the database.
     * Request validation is a key Laravel security feature.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'body'   => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified post.
     *
     * Tutorial: The show method handles GET /posts/{post}
     * Laravel automatically resolves the Post model from the route parameter
     * using "Route Model Binding" - no manual query needed!
     */
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * Tutorial: The edit method handles GET /posts/{post}/edit
     * It returns a view with a form pre-filled with the post's data.
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in the database.
     *
     * Tutorial: The update method handles PUT/PATCH /posts/{post}
     * HTML forms only support GET and POST, so Laravel uses method spoofing
     * via a hidden _method field (added with @method('PUT') in Blade).
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'body'   => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        $post->update($validated);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from the database.
     *
     * Tutorial: The destroy method handles DELETE /posts/{post}
     * Like update, it uses method spoofing with @method('DELETE') in Blade.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
