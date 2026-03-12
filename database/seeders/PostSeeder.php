<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Tutorial Concept: Database Seeders
 *
 * Seeders allow you to populate your database with test data.
 * Run seeders with: php artisan db:seed
 * Or with migrations: php artisan migrate --seed
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Tutorial: Model::create() inserts a new record into the database.
     * The data must be listed in the model's $fillable array.
     */
    public function run(): void
    {
        $posts = [
            [
                'title'  => 'Getting Started with Laravel',
                'body'   => 'Laravel is a web application framework with expressive, elegant syntax. It provides tools needed for large, robust applications, including a powerful ORM, simple routing, and a blade templating engine.',
                'author' => 'Lei Dizon',
            ],
            [
                'title'  => 'Understanding Laravel Routing',
                'body'   => 'Routes define how your application responds to HTTP requests. Laravel supports GET, POST, PUT, PATCH, DELETE, and OPTIONS HTTP methods. Resource routes provide a convenient way to create RESTful routes.',
                'author' => 'Lei Dizon',
            ],
            [
                'title'  => 'Laravel Eloquent ORM',
                'body'   => 'Eloquent provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding Model which is used to interact with that table.',
                'author' => 'Lei Dizon',
            ],
            [
                'title'  => 'Blade Templating Engine',
                'body'   => 'Blade is the simple, yet powerful templating engine included with Laravel. Blade views are compiled into plain PHP code and cached until they are modified, adding essentially zero overhead.',
                'author' => 'Lei Dizon',
            ],
            [
                'title'  => 'Laravel Middleware',
                'body'   => 'Middleware provide a convenient mechanism for inspecting and filtering HTTP requests entering your application. For example, Laravel includes middleware that verifies the user is authenticated.',
                'author' => 'Lei Dizon',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
