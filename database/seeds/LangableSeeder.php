<?php
/**
 * Class LangableSeeder.
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
 * Class LangableSeeder
 */
class LangableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('langables')->insert(
            [
                [
                    'language_id' => 1,
                    'langable_id'  => 2,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 2,
                    'langable_id'  => 2,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 3,
                    'langable_id'  => 3,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 4,
                    'langable_id'  => 3,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 5,
                    'langable_id'  => 4,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 6,
                    'langable_id'  => 4,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 7,
                    'langable_id'  => 5,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 8,
                    'langable_id'  => 6,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 9,
                    'langable_id'  => 6,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 10,
                    'langable_id'  => 7,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 11,
                    'langable_id'  => 8,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 12,
                    'langable_id'  => 9,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 13,
                    'langable_id'  => 10,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 14,
                    'langable_id'  => 11,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 15,
                    'langable_id'  => 12,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 16,
                    'langable_id'  => 13,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 17,
                    'langable_id'  => 14,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 18,
                    'langable_id'  => 15,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 19,
                    'langable_id'  => 16,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 20,
                    'langable_id'  => 17,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 21,
                    'langable_id'  => 18,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 22,
                    'langable_id'  => 18,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 23,
                    'langable_id'  => 19,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 24,
                    'langable_id'  => 20,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 23,
                    'langable_id'  => 21,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 24,
                    'langable_id'  => 22,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 23,
                    'langable_id'  => 23,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 24,
                    'langable_id'  => 24,
                    'langable_type'  => 'App\User',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                //Jobs
                [
                    'language_id' => 10,
                    'langable_id'  => 1,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 11,
                    'langable_id'  => 2,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 12,
                    'langable_id'  => 3,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 16,
                    'langable_id'  => 4,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 17,
                    'langable_id'  => 5,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 15,
                    'langable_id'  => 6,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 11,
                    'langable_id'  => 7,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 17,
                    'langable_id'  => 8,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 23,
                    'langable_id'  => 9,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'language_id' => 24,
                    'langable_id'  => 10,
                    'langable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
