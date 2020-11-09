<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
//        /** @var User $user */
//        $alice = User::create([
//            'full_name' => 'Алиса Селезнева',
//            'email'=>'lostnfound@mrcolt.com',
//            'password' => Hash::make('12345678'),
//        ]);

    }
}
