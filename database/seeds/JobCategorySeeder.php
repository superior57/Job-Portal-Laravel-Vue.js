<?php

/**
 * Class JobCategorySeeder.
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
 * Class JobCategorySeeder
 */
class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catables')->insert(
            [
                [
                    'category_id' => 1,
                    'catable_id'  => 1,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 2,
                    'catable_id'  => 1,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 1,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 2,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 2,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 3,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 3,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 4,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 1,
                    'catable_id'  => 4,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 2,
                    'catable_id'  => 5,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 5,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 6,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 6,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 7,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 7,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 8,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 8,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 9,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 1,
                    'catable_id'  => 9,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 10,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 10,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 11,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 11,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 1,
                    'catable_id'  => 12,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 2,
                    'catable_id'  => 12,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 13,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 13,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 14,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 14,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 15,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 15,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 16,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 16,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 17,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 17,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 18,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 18,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 19,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 2,
                    'catable_id'  => 20,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 1,
                    'catable_id'  => 21,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 22,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 23,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 3,
                    'catable_id'  => 24,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 4,
                    'catable_id'  => 19,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 5,
                    'catable_id'  => 20,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 6,
                    'catable_id'  => 21,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 7,
                    'catable_id'  => 22,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 8,
                    'catable_id'  => 23,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'category_id' => 1,
                    'catable_id'  => 24,
                    'catable_type'  => 'App\Job',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
