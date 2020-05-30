<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('seeds/Categories.sql');
        DB::unprepared(file_get_contents($file));
        $file = database_path('seeds/Books.sql');
        DB::unprepared(file_get_contents($file));
    }
}
