<?php

/**
 * Class CategorySeeder.
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @link    http://www.amentotech.com
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title' => 'Mobiles',
                    'slug'  => 'mobiles',
                    'image'  => '1.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Digital Marketing',
                    'slug'  => 'digital-marketing',
                    'image'  => '2.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Writing & Translation',
                    'slug'  => 'writing-translation',
                    'image'  => '3.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Video & Animation',
                    'slug'  => 'video-animation',
                    'image'  => '4.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Music & Audio',
                    'slug'  => 'music-audio',
                    'image'  => '5.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Programming & Tech',
                    'slug'  => 'programming-tech',
                    'image'  => '6.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Business',
                    'slug'  => 'business',
                    'image'  => '7.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Fun & Lifestyle',
                    'slug'  => 'fun-lifestyle',
                    'image'  => '8.png',
                    'abstract'  => 'Consectetur adipisicing elitaed eiusmod tempor incididuatna labore et dolore magna.',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

            ]
        );
    }
}
