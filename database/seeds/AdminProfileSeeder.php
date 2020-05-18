<?php
/**
 * Class AdminProfileSeeder.
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
 * Class ProfileSeeder
 */
class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(
            [
                //Admin
                [
                    'user_id' => '1',
                    'department_id' => null,
                    'no_of_employees' => null,
                    'freelancer_type' => null,
                    'english_level' => null,
                    'hourly_rate' => null,
                    'experience' => null,
                    'education' => null,
                    'projects' => null,
                    'awards' => null,
                    'saved_jobs' => null,
                    'saved_employers' => null,
                    'ratings' => null,
                    'address' => null,
                    'longitude' => null,
                    'latitude' => null,
                    'avater' => 'a.jpg',
                    'banner' => 'b.jpg',
                    'gender' => null,
                    'tagline' => null,
                    'description' => null,
                    'delete_reason' => null,
                    'delete_description' => null,
                    'profile_searchable' => null,
                    'profile_blocked' => null,
                    'weekly_alerts' => null,
                    'message_alerts' => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
