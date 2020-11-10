<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['При мне', 'Потерян', 'Архивен'];
        foreach ($statuses as $categories) {
            Status::create([
                'name' => $categories
            ]);
        }
    }
}
