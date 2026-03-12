<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Tutorial</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; color: #333; min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; }
        .hero { text-align: center; padding: 3rem 2rem; }
        .hero h1 { font-size: 3rem; color: #4f46e5; margin-bottom: 1rem; }
        .hero p { font-size: 1.25rem; color: #6b7280; max-width: 600px; margin: 0 auto 2rem; line-height: 1.6; }
        .btn { display: inline-block; padding: 0.75rem 2rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1rem; }
        .btn-primary { background: #4f46e5; color: white; margin-right: 1rem; }
        .btn-primary:hover { background: #4338ca; }
        .btn-outline { border: 2px solid #4f46e5; color: #4f46e5; }
        .btn-outline:hover { background: #4f46e5; color: white; }
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; max-width: 900px; margin: 3rem auto; padding: 0 2rem; }
        .feature { background: white; border-radius: 10px; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.08); text-align: center; }
        .feature .icon { font-size: 2rem; margin-bottom: 0.75rem; }
        .feature h3 { color: #4f46e5; margin-bottom: 0.5rem; }
        .feature p { font-size: 0.9rem; color: #6b7280; line-height: 1.5; }
    </style>
</head>
<body>
    <div class="hero">
        <h1>🎓 Laravel Tutorial</h1>
        <p>My pathway into learning Laravel — a hands-on blog application demonstrating core Laravel concepts including routing, controllers, Eloquent ORM, Blade templating, migrations, and more.</p>
        <a href="/posts" class="btn btn-primary">View Blog Posts</a>
        <a href="https://laravel.com/docs" class="btn btn-outline" target="_blank">Laravel Docs</a>
    </div>

    <div class="features">
        <div class="feature">
            <div class="icon">🛣️</div>
            <h3>Routing</h3>
            <p>RESTful resource routes mapping HTTP verbs to controller actions.</p>
        </div>
        <div class="feature">
            <div class="icon">🎮</div>
            <h3>Controllers</h3>
            <p>Resource controllers handling CRUD operations with clean separation of concerns.</p>
        </div>
        <div class="feature">
            <div class="icon">🗄️</div>
            <h3>Eloquent ORM</h3>
            <p>ActiveRecord implementation for database interaction with an expressive API.</p>
        </div>
        <div class="feature">
            <div class="icon">🎨</div>
            <h3>Blade Templates</h3>
            <p>Powerful templating engine with template inheritance and control structures.</p>
        </div>
        <div class="feature">
            <div class="icon">📦</div>
            <h3>Migrations</h3>
            <p>Version control for your database schema using expressive PHP code.</p>
        </div>
        <div class="feature">
            <div class="icon">✅</div>
            <h3>Validation</h3>
            <p>Built-in request validation with automatic error handling and redirection.</p>
        </div>
    </div>
</body>
</html>
