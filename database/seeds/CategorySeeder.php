<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 10)->create()->each(
            function($category){
                $category->save();
            }
        );
    }
}
