# 🎓 Laravel Tutorial — My Learning Pathway

A hands-on Laravel application built as a learning journey through the core concepts of the Laravel PHP framework. This project is a simple **blog/CRUD application** that demonstrates the key pillars of Laravel development.

## 📚 Learning Pathway

### Step 1 — Routing (`routes/web.php`)
Laravel routing maps HTTP requests to controller actions. Resource routes provide a full set of RESTful routes in a single line:

```php
Route::resource('posts', PostController::class);
```

This single line creates 7 routes: `index`, `create`, `store`, `show`, `edit`, `update`, and `destroy`.

---

### Step 2 — Controllers (`app/Http/Controllers/PostController.php`)
Controllers handle incoming HTTP requests and return a response. This project uses a **Resource Controller** which follows RESTful conventions:

| Method    | Route               | Action  |
|-----------|---------------------|---------|
| GET       | /posts              | index   |
| GET       | /posts/create       | create  |
| POST      | /posts              | store   |
| GET       | /posts/{post}       | show    |
| GET       | /posts/{post}/edit  | edit    |
| PUT/PATCH | /posts/{post}       | update  |
| DELETE    | /posts/{post}       | destroy |

---

### Step 3 — Models & Eloquent ORM (`app/Models/Post.php`)
Eloquent is Laravel's built-in ORM (Object-Relational Mapper). Each database table has a corresponding Model:

```php
// Retrieve all posts, sorted newest first, 10 per page
$posts = Post::latest()->paginate(10);

// Create a new post
Post::create(['title' => 'My Post', 'body' => '...', 'author' => 'Me']);

// Update a post
$post->update(['title' => 'Updated Title']);

// Delete a post
$post->delete();
```

---

### Step 4 — Migrations (`database/migrations/`)
Migrations are version control for your database schema:

```bash
# Run all pending migrations
php artisan migrate

# Rollback the last batch of migrations
php artisan migrate:rollback

# Fresh migration (drops all tables and re-runs)
php artisan migrate:fresh --seed
```

---

### Step 5 — Blade Templating (`resources/views/`)
Blade is Laravel's templating engine. Key features:

```blade
{{-- Template inheritance --}}
@extends('layouts.app')
@section('content')
    {{-- Content goes here --}}
@endsection

{{-- Echoing data (XSS-safe) --}}
{{ $post->title }}

{{-- Loops --}}
@forelse ($posts as $post)
    <p>{{ $post->title }}</p>
@empty
    <p>No posts found.</p>
@endforelse

{{-- CSRF protection (required for all forms) --}}
<form method="POST" action="/posts">
    @csrf
    @method('PUT') {{-- For PUT/DELETE methods --}}
</form>
```

---

### Step 6 — Validation
Laravel's built-in validation in controllers:

```php
$validated = $request->validate([
    'title'  => 'required|string|max:255',
    'body'   => 'required|string',
    'author' => 'required|string|max:100',
]);
```

On failure, Laravel automatically redirects back with errors accessible via `$errors` in Blade.

---

### Step 7 — Route Model Binding
Laravel automatically resolves Eloquent models from route parameters:

```php
// No manual Post::find($id) needed!
public function show(Post $post): View
{
    return view('posts.show', compact('post'));
}
```

---

### Step 8 — Seeders (`database/seeders/`)
Populate your database with sample data for development:

```bash
php artisan db:seed
```

---

## 🚀 Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- SQLite (or MySQL/PostgreSQL)

### Installation

```bash
# Clone the repository
git clone https://github.com/LeiDizon/laravel-tutorial.git
cd laravel-tutorial

# Install PHP dependencies
composer install

# Copy environment configuration
cp .env.example .env

# Generate application key
php artisan key:generate

# Create the SQLite database and run migrations
touch database/database.sqlite
php artisan migrate --seed

# Start the development server
php artisan serve
```

Visit `http://localhost:8000` to see the application.

---

## 📁 Project Structure

```
laravel-tutorial/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PostController.php   # CRUD controller
│   └── Models/
│       └── Post.php                 # Eloquent model
├── database/
│   ├── migrations/
│   │   └── *_create_posts_table.php # Database schema
│   └── seeders/
│       ├── DatabaseSeeder.php       # Main seeder
│       └── PostSeeder.php           # Sample data
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php        # Main layout template
│       ├── posts/
│       │   ├── index.blade.php      # List all posts
│       │   ├── show.blade.php       # Show single post
│       │   ├── create.blade.php     # Create post form
│       │   └── edit.blade.php       # Edit post form
│       └── welcome.blade.php        # Home page
└── routes/
    └── web.php                      # Application routes
```

---

## 🔗 Key Laravel Concepts Covered

- ✅ **Routing** — Resource routes, named routes, route model binding
- ✅ **Controllers** — Resource controllers, dependency injection
- ✅ **Eloquent ORM** — Models, mass assignment, `$fillable`
- ✅ **Blade Templating** — Layouts, directives, escaping
- ✅ **Migrations** — Schema creation, rollbacks
- ✅ **Validation** — Request validation, error display
- ✅ **Flash Messages** — Session flash for success/error feedback
- ✅ **Pagination** — Eloquent paginator
- ✅ **CSRF Protection** — `@csrf` directive
- ✅ **Method Spoofing** — `@method('DELETE')` / `@method('PUT')`
- ✅ **Seeders** — Database population for development

---

## 📖 Further Learning

- [Laravel Official Documentation](https://laravel.com/docs)
- [Laracasts — Laravel From Scratch](https://laracasts.com/series/laravel-8-from-scratch)
- [Laravel News](https://laravel-news.com)
