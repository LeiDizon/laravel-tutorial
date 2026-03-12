@extends('layouts.app')

@section('content')
    <div style="margin-top:1.5rem;">
        <a href="{{ route('posts.index') }}" style="color:#4f46e5;">&larr; Back to Posts</a>
    </div>

    <div class="card" style="margin-top:1rem;">
        <h1>Create New Post</h1>

        {{--
            Tutorial: Form Validation Errors
            When validation fails, Laravel redirects back with errors.
            @if ($errors->any()) checks if any validation errors exist.
            $errors->all() returns all error messages as an array.
        --}}
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
            Tutorial: Forms
            - action="{{ route('posts.store') }}" sets the form submission URL
            - method="POST" is required for creating resources
            - @csrf generates a hidden CSRF token field (required for all POST forms)
            - old('field') repopulates the field value after a failed validation
        --}}
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                placeholder="Enter post title" required>
            {{-- Tutorial: @error directive checks for a specific field's error --}}
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}"
                placeholder="Your name" required>
            @error('author')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="body">Content</label>
            <textarea id="body" name="body" rows="8"
                placeholder="Write your post content here..." required>{{ old('body') }}</textarea>
            @error('body')
                <span class="error">{{ $message }}</span>
            @enderror

            <div class="actions" style="margin-top:1.5rem;">
                <button type="submit" class="btn btn-primary">Publish Post</button>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
