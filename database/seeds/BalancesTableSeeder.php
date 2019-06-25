<?php

use Illuminate\Database\Seeder;
use App\Models\Balance;

class BalancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            'user_id' => 4,
            'amount' => 555.99,
        ]);
    }
}
