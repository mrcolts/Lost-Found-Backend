<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 30; ++$i) {
            $user = User::inRandomOrder()->firstOrFail();
            $category = Category::inRandomOrder()->firstOrFail();

            $user->posts()->create([
                'title' => Faker\Provider\en_US\Text::lexify('******'),
                'description' => Faker\Provider\en_US\Text::lexify('????????? ??? ???????? ??? ??????????????????'),
                'category_id' => $category->id,
            ]);
        }
    }
}
