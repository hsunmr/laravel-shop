<?php

use Illuminate\Database\Seeder;
use App\Models\Earnings;

class EarningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ;$i <12 ;$i++){
            Earnings::create([
                'year' => '2018',
                'month' => $i+1,
                'earnings' => '0'
            ]);
        }
    }
}
