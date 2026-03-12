<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Tutorial Concept: DatabaseSeeder
 *
 * The DatabaseSeeder is the main seeder class that orchestrates all other seeders.
 * Run all seeders with: php artisan db:seed
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PostSeeder::class,
        ]);
    }
}
