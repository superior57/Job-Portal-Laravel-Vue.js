<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert(
            [
                [
                    'user_id' => 4,
                    'receiver_id'  => 21,
                    'job_id'  => 3,
                    'feedback'  => 'Donec placerat, massa eu tincidunt volutpat.',
                    'rating'  => 'a:4:{i:0;a:2:{s:6:"rating";i:5;s:6:"reason";i:1;}i:1;a:2:{s:6:"rating";i:5;s:6:"reason";i:2;}i:2;a:2:{s:6:"rating";i:5;s:6:"reason";i:3;}i:3;a:2:{s:6:"rating";i:5;s:6:"reason";i:4;}}',
                    'avg_rating'  => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'project_type'  => 'job',
                    'service_id'  => null,
                ],
                [
                    'user_id' => 4,
                    'receiver_id'  => 22,
                    'job_id'  => 1,
                    'feedback'  => 'Donec placerat, massa eu tincidunt volutpat.',
                    'rating'  => 'a:4:{i:0;a:2:{s:6:"rating";i:5;s:6:"reason";i:1;}i:1;a:2:{s:6:"rating";i:5;s:6:"reason";i:2;}i:2;a:2:{s:6:"rating";i:5;s:6:"reason";i:3;}i:3;a:2:{s:6:"rating";i:5;s:6:"reason";i:4;}}',
                    'avg_rating'  => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'project_type'  => 'job',
                    'service_id'  => null,
                ],
                [
                    'user_id' => 4,
                    'receiver_id'  => 23,
                    'job_id'  => 27,
                    'feedback'  => 'Donec placerat, massa eu tincidunt volutpat.',
                    'rating'  => 'a:4:{i:0;a:2:{s:6:"rating";i:5;s:6:"reason";i:1;}i:1;a:2:{s:6:"rating";i:5;s:6:"reason";i:2;}i:2;a:2:{s:6:"rating";i:5;s:6:"reason";i:3;}i:3;a:2:{s:6:"rating";i:5;s:6:"reason";i:4;}}',
                    'avg_rating'  => 3,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'project_type'  => 'job',
                    'service_id'  => null,
                ],
                [
                    'user_id' => 4,
                    'receiver_id'  => 20,
                    'job_id'  => 15,
                    'feedback'  => 'Donec placerat, massa eu tincidunt volutpat.',
                    'rating'  => 'a:4:{i:0;a:2:{s:6:"rating";i:5;s:6:"reason";i:1;}i:1;a:2:{s:6:"rating";i:5;s:6:"reason";i:2;}i:2;a:2:{s:6:"rating";i:5;s:6:"reason";i:3;}i:3;a:2:{s:6:"rating";i:5;s:6:"reason";i:4;}}',
                    'avg_rating'  => 4,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'project_type'  => 'job',
                    'service_id'  => null,
                ],
                
            ]
        );
    }
}
