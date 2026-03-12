{{--
    Tutorial: Template Inheritance
    @extends tells Blade this view inherits from the layouts/app template.
    @section('content') fills the @yield('content') placeholder in the layout.
--}}
@extends('layouts.app')

@section('content')
    <div style="display:flex; justify-content:space-between; align-items:center; margin-top:1.5rem;">
        <h1>Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New Post</a>
    </div>

    {{--
        Tutorial: @forelse is like @foreach but handles empty collections gracefully.
        $posts is passed from PostController::index() using compact('posts').
    --}}
    @forelse ($posts as $post)
        <div class="card">
            {{--
                Tutorial: route() helper generates URLs for named routes.
                Route::resource() automatically names routes like posts.show, posts.edit, etc.
            --}}
            <h2><a href="{{ route('posts.show', $post) }}" style="color:#4f46e5; text-decoration:none;">{{ $post->title }}</a></h2>
            <p class="post-meta">By {{ $post->author }} &bull; {{ $post->created_at->diffForHumans() }}</p>
            <p>{{ Str::limit($post->body, 150) }}</p>
            <div class="actions">
                <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary btn-sm">Read</a>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Edit</a>
                {{--
                    Tutorial: HTML forms only support GET and POST.
                    To send a DELETE request, use @method('DELETE') inside a POST form.
                    @csrf adds a CSRF token to protect against cross-site request forgery.
                --}}
                <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this post?')">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <div class="card">
            <p>No posts yet. <a href="{{ route('posts.create') }}">Create your first post!</a></p>
        </div>
    @endforelse

    {{--
        Tutorial: Pagination
        Laravel's paginate() method returns a LengthAwarePaginator.
        The links() method renders Bootstrap-compatible pagination links.
    --}}
    {{ $posts->links() }}
@endsection
