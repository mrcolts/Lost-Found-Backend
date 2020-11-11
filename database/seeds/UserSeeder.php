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

        User::create([
            'full_name' => 'Шорин Алихан',
            'phone' => '+77010000000',
            'email'=>'skifcha09@yandex.kz',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'full_name' => 'Демченко Алексей',
            'phone' => '+77010000000',
            'email'=>'demchenko.alexey.s@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
