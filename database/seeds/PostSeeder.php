<?php

use Illuminate\Database\Seeder;

use App\Post;

class PostSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 30)->create()->each(
            function($post){
                $post->save();
            }
        );
    }
}
