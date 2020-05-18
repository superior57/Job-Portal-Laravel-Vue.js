<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DeliveryTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('delivery_times')->insert(
            [
                [
                    'title' => '1 Day',
                    'slug' => '1-day',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'title' => '2 Days',
                    'slug' => '2-days',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'title' => '3 Days',
                    'slug' => '3-days',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
            ]
        );
    }
}
