<?php
/**
 * Class TrialPackageSeeder.
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
 * Class TrialPackageSeeder
 */
class TrialPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(
            [
                [
                    'title' => 'Trial Employer',
                    'subtitle' => '30 Days Trial',
                    'slug' => 'trial-employer',
                    'cost' => '0',
                    'role_id' => '2',
                    'trial' => '1',
                    'badge_id' => '0',
                    'options' => 'a:5:{s:4:"jobs";s:1:"5";s:13:"featured_jobs";s:1:"2";s:8:"duration";s:2:"30";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Trial Freelancer',
                    'subtitle' => '30 Days Trial',
                    'slug' => 'trial-freelancer',
                    'cost' => '0',
                    'role_id' => '3',
                    'trial' => '1',
                    'badge_id' => '0',
                    'options' => 'a:6:{s:14:"no_of_connects";s:2:"10";s:12:"no_of_skills";s:1:"3";s:8:"duration";s:2:"30";s:5:"badge";N;s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
