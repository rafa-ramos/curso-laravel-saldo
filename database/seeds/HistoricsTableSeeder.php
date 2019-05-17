<?php

use Illuminate\Database\Seeder;
use App\Models\Historic;

class HistoricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Historic::create([
            'user_id' => 1,
            'type' => 'I',
            'amount' => 99.01,
            'total_before' => 499.01,
            'total_after' => 400,
            'user_id_transaction' => 4,
            'date' => '2019/05/17'
        ]);
    }
}
