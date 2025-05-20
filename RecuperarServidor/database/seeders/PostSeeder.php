<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
        'title' => 'Primer post',
        'content' => 'Este es el contenido del primer post.',
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
]);
    }
}
