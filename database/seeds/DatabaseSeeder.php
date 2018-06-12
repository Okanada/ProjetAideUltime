<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);  
        $this->call(UserTableSeeder::class);
        // $this->call(PostTableSeeder::class); <-- ON ENLEVE CETTE COMMANDE CAR LE USERTABLESEEDER VA GERER LES POST
    }
}
