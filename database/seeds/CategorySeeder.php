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
        $statuses = ['along', 'lost', 'archived'];
        foreach ($statuses as $status) {
            Category::create([
                'name' => $status
             ]);
        }
        
    }
}
