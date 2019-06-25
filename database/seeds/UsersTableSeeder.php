<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rafael Ramos',
            'email' => '161553@upf.br',
            'password' => bcrypt('admin'),

        ]);

        User::create([
            'name' => 'New User',
            'email' => 'new@ upf.br',
            'password' => bcrypt('admin'),

        ]);
    }
}
