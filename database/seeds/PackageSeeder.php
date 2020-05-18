<?php
/**
 * Class PackageSeeder.
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
 * Class PackageSeeder
 */
class PackageSeeder extends Seeder
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
                    'options' => 'a:7:{s:14:"no_of_connects";s:2:"10";s:12:"no_of_skills";s:1:"3";s:14:"no_of_services";s:1:"5";s:23:"no_of_featured_services";s:1:"5";s:8:"duration";s:2:"10";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Basic',
                    'subtitle' => 'Extended Plan For Managerial',
                    'slug' => 'basic',
                    'cost' => '60.00',
                    'role_id' => '3',
                    'trial' => '0',
                    'badge_id' => '1',
                    'options' => 'a:8:{s:14:"no_of_connects";s:2:"60";s:12:"no_of_skills";s:2:"15";s:14:"no_of_services";s:1:"8";s:23:"no_of_featured_services";s:1:"5";s:8:"duration";s:2:"10";s:5:"badge";s:1:"1";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Plus Members',
                    'subtitle' => 'Starter Plan For Newbie',
                    'slug' => 'plus-member',
                    'cost' => '90.00',
                    'role_id' => '3',
                    'trial' => '0',
                    'badge_id' => '2',
                    'options' => 'a:8:{s:14:"no_of_connects";s:2:"90";s:12:"no_of_skills";s:2:"20";s:14:"no_of_services";s:2:"10";s:23:"no_of_featured_services";s:1:"8";s:8:"duration";s:2:"10";s:5:"badge";s:1:"2";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Pro Members',
                    'subtitle' => 'Popular Plan For Professionals',
                    'slug' => 'pro-members',
                    'cost' => '120.00',
                    'role_id' => '3',
                    'trial' => '0',
                    'badge_id' => '3',
                    'options' => 'a:8:{s:14:"no_of_connects";s:3:"120";s:12:"no_of_skills";s:2:"30";s:14:"no_of_services";s:2:"20";s:23:"no_of_featured_services";s:2:"10";s:8:"duration";s:2:"10";s:5:"badge";s:1:"3";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Paltinum',
                    'subtitle' => 'For Employers',
                    'slug' => 'paltinum',
                    'cost' => '90.00',
                    'role_id' => '2',
                    'trial' => '0',
                    'badge_id' => '0',
                    'options' => 'a:5:{s:4:"jobs";s:2:"15";s:13:"featured_jobs";s:1:"5";s:8:"duration";s:2:"10";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Silver',
                    'subtitle' => 'Package for Employers',
                    'slug' => 'silver',
                    'cost' => '120.00',
                    'role_id' => '2',
                    'trial' => '0',
                    'badge_id' => '0',
                    'options' => 'a:5:{s:4:"jobs";s:1:"5";s:13:"featured_jobs";s:1:"3";s:8:"duration";s:2:"30";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Gold',
                    'subtitle' => 'Package for Employers',
                    'slug' => 'gold',
                    'cost' => '180.00',
                    'role_id' => '2',
                    'trial' => '0',
                    'badge_id' => '0',
                    'options' => 'a:5:{s:4:"jobs";s:2:"10";s:13:"featured_jobs";s:1:"5";s:8:"duration";s:3:"360";s:13:"banner_option";s:4:"true";s:12:"private_chat";s:4:"true";}',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
