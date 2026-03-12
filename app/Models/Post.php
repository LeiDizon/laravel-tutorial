<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Tutorial Concept: Eloquent ORM Model
 *
 * Models represent database tables and allow you to interact with your
 * database using an expressive, fluent API instead of raw SQL queries.
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $author
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * Tutorial: $fillable protects against mass assignment vulnerabilities.
     * Only listed fields can be set using create() or fill() methods.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'author',
    ];
}
