<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'okharu clinton',
            'password' => bcrypt('123456'),
            'email' => 'admin@gmail.com',
            'admin'=> 1,
            'avatar' =>  asset('avatars/avatar.jfif')

        ]);

        App\User::create([
            'name' => 'Emily Myers',
            'password' => bcrypt('password'),
            'email' => 'helanajam3@gmail.com',
             'admin'=> 0,
            'avatar' => asset('avatars/avatar.jfif')
        ]); 
    }
}
