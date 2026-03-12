@extends('layouts.app')

@section('content')
    <div style="margin-top:1.5rem;">
        <a href="{{ route('posts.index') }}" style="color:#4f46e5;">&larr; Back to Posts</a>
    </div>

    <div class="card" style="margin-top:1rem;">
        <h1>{{ $post->title }}</h1>
        <p class="post-meta">By {{ $post->author }} &bull; {{ $post->created_at->format('F j, Y') }}</p>
        <hr style="margin: 1rem 0; border-color: #e5e7eb;">
        {{--
            Tutorial: nl2br() and {!! !!}
            Use {!! !!} (unescaped) only for trusted HTML content.
            For user-generated content, prefer {{ }} (escaped) to prevent XSS.
            nl2br() converts newlines to <br> tags.
        --}}
        <p style="line-height:1.7;">{{ $post->body }}</p>
        <div class="actions" style="margin-top:1.5rem;">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Post</a>
            <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</button>
            </form>
        </div>
    </div>
@endsection
