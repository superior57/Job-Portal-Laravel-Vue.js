<?php

/**
 * Class UserSkillSeeder.
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
 * Class UserSkillSeeder
 */
class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_user')->insert(
            [
                [
                    'user_id' => 13,
                    'skill_id' => 2,
                    'skill_rating' => 100,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 13,
                    'skill_id' => 3,
                    'skill_rating' => 100,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 14,
                    'skill_id' => 4,
                    'skill_rating' => 90,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 14,
                    'skill_id' => 5,
                    'skill_rating' => 70,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 14,
                    'skill_id' => 6,
                    'skill_rating' => 80,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 15,
                    'skill_id' => 7,
                    'skill_rating' => 65,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 16,
                    'skill_id' => 8,
                    'skill_rating' => 75,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 17,
                    'skill_id' => 9,
                    'skill_rating' => 90,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 17,
                    'skill_id' => 10,
                    'skill_rating' => 50,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 17,
                    'skill_id' => 4,
                    'skill_rating' => 78,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 18,
                    'skill_id' => 7,
                    'skill_rating' => 69,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 18,
                    'skill_id' => 8,
                    'skill_rating' => 84,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 19,
                    'skill_id' => 13,
                    'skill_rating' => 100,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 19,
                    'skill_id' => 14,
                    'skill_rating' => 80,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 20,
                    'skill_id' => 2,
                    'skill_rating' => 15,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 20,
                    'skill_id' => 3,
                    'skill_rating' => 21,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 20,
                    'skill_id' => 4,
                    'skill_rating' => 99,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 20,
                    'skill_id' => 5,
                    'skill_rating' => 85,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 21,
                    'skill_id' => 10,
                    'skill_rating' => 14,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 21,
                    'skill_id' => 11,
                    'skill_rating' => 89,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 22,
                    'skill_id' => 12,
                    'skill_rating' => 23,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 23,
                    'skill_id' => 15,
                    'skill_rating' => 35,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 19,
                    'skill_id' => 9,
                    'skill_rating' => 72,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 18,
                    'skill_id' => 13,
                    'skill_rating' => 95,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 23,
                    'skill_id' => 8,
                    'skill_rating' => 45,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 24,
                    'skill_id' => 8,
                    'skill_rating' => 45,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 24,
                    'skill_id' => 10,
                    'skill_rating' => 45,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'user_id' => 15,
                    'skill_id' => 98,
                    'skill_rating' => 80,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

            ]
        );
    }
}
