@extends('layouts.app')

@section('content')
    <div style="margin-top:1.5rem;">
        <a href="{{ route('posts.show', $post) }}" style="color:#4f46e5;">&larr; Back to Post</a>
    </div>

    <div class="card" style="margin-top:1rem;">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="padding-left:1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{--
            Tutorial: Updating Resources
            - Use @method('PUT') for full updates or @method('PATCH') for partial updates
            - old('field', $post->field) uses the old input if available, otherwise falls back to the model value
        --}}
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <label for="title">Title</label>
            <input type="text" id="title" name="title"
                value="{{ old('title', $post->title) }}" required>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="author">Author</label>
            <input type="text" id="author" name="author"
                value="{{ old('author', $post->author) }}" required>
            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="body">Content</label>
            <textarea id="body" name="body" rows="8" required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <span class="error">{{ $message }}</span>
            @enderror

            <div class="actions" style="margin-top:1.5rem;">
                <button type="submit" class="btn btn-primary">Update Post</button>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
