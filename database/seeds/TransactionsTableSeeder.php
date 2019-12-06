<?php

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $faker = Faker\Factory::create();
        foreach(range(1,90) as $index)
        {
            for($i = 0; $i < rand(1,3); $i++)
            {
                Transaction::create([
                    'transaction_date' => $now,
                    'amount' => rand(-10000, 10000)/100,
                    'description' => $faker->sentence
                ]);
            }

            $now->subDay();
        }
    }
}
