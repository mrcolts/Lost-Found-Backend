<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
        /** @var User $user */
        User::create([
            'full_name' => 'Мистер Пользователь',
            'phone' => '+77010000000',
            'email'=>'user@mrcolt.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
