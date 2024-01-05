<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {                  //เลือกใช้10
        Blog::factory()->count(10)->create();
    }
}
