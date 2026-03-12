<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--
        Tutorial Concept: Blade Templating
        Blade uses {{ }} for echoing data (auto-escaped to prevent XSS)
        and @directives for control structures and template inheritance.
    --}}
    <title>{{ config('app.name', 'Laravel Tutorial') }}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; color: #333; }
        nav { background: #4f46e5; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; text-decoration: none; font-weight: 600; }
        nav .nav-links a { margin-left: 1.5rem; opacity: 0.85; }
        nav .nav-links a:hover { opacity: 1; }
        .container { max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 8px; padding: 1.5rem; margin-bottom: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .btn { display: inline-block; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 600; cursor: pointer; border: none; font-size: 0.9rem; }
        .btn-primary { background: #4f46e5; color: white; }
        .btn-primary:hover { background: #4338ca; }
        .btn-secondary { background: #6b7280; color: white; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 0.25rem 0.75rem; font-size: 0.8rem; }
        .alert { padding: 1rem; border-radius: 6px; margin-bottom: 1rem; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
        form input, form textarea { width: 100%; padding: 0.625rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; margin-top: 0.25rem; }
        form label { font-weight: 600; display: block; margin-top: 1rem; }
        form .error { color: #ef4444; font-size: 0.85rem; margin-top: 0.25rem; }
        h1, h2 { margin-bottom: 1rem; }
        .post-meta { color: #6b7280; font-size: 0.85rem; margin-bottom: 0.75rem; }
        .pagination { display: flex; gap: 0.5rem; margin-top: 1.5rem; }
        .pagination a, .pagination span { padding: 0.4rem 0.75rem; border: 1px solid #d1d5db; border-radius: 4px; text-decoration: none; color: #4f46e5; }
        .pagination .active { background: #4f46e5; color: white; border-color: #4f46e5; }
        .actions { display: flex; gap: 0.5rem; margin-top: 1rem; }
    </style>
</head>
<body>

{{-- Tutorial: @section and @yield are used for template inheritance --}}
<nav>
    <a href="/">🎓 Laravel Tutorial</a>
    <div class="nav-links">
        <a href="{{ route('posts.index') }}">Blog Posts</a>
        <a href="{{ route('posts.create') }}">New Post</a>
    </div>
</nav>

<div class="container">
    {{--
        Tutorial: @if / @session
        Check for flash messages set with ->with('success', '...') in the controller.
    --}}
    @if (session('success'))
        <div class="alert alert-success" style="margin-top:1rem;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tutorial: @yield defines a placeholder that child views fill with @section --}}
    @yield('content')
</div>

</body>
</html>
