<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Животные', 'Документы', 'Гаджеты', 'Ключи', 'Одежда', 'Аксессуары', 'Прочее'];
        foreach ($statuses as $categories) {
            Category::create([
                'name' => $categories
             ]);
        }

    }
}
