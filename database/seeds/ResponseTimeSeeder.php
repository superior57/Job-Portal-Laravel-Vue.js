<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ResponseTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('response_times')->insert(
            [
                [
                    'title' => '1 Hour',
                    'slug' => '1-hour',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'title' => '2 Hours',
                    'slug' => '2-hours',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'title' => '3 Hours',
                    'slug' => '3-hours',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
            ]
        );
    }
}
