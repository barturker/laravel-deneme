<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('blog_posts')->truncate();
        DB::table('comments')->truncate();

        BlogPost::factory(10)->create()->each(function($blogpost){
            $blogpost->comments()->save(Comment::factory()->make());
            // \App\Models\User::factory(10)->create();
        });

        // \App\Models\User::factory(10)->create();
    }
}
