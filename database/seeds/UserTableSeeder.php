<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Okan',
            'email' => 'guidegalactique@gmail.com',
            'password' => bcrypt('kingdomhearts'),
            'role_id' => 1,
        ]);

      factory(App\User::class, 10) ->create()
        ->each(function ($user){
             $user->posts()->save(factory(App\Post::class)->make());
        
    });
    }
}
