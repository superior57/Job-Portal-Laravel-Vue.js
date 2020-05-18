<?php

/**
 * Class SiteManagementSeeder.
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
use App\Helper;

/**
 * Class MetaSeeder
 */

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metas')->delete();
        DB::table('metas')->insert(
            [
                [
                    'meta_key' => 'content0',
                    'meta_value' => Helper::getAboutSeeder(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'title',
                    'meta_value' => 1,
                    'metable_type' => 'App\Page',
                    'metable_id' => 2,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'cat1',
                    'meta_value' => Helper::getFirstHomeCat(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'welcome_sections3',
                    'meta_value' => 'a:11:{s:18:"welcome_background";s:32:"1579153406-1557484284-banner.jpg";s:11:"first_title";s:16:"Start As Company";s:9:"first_url";s:1:"#";s:16:"first_url_button";s:8:"JOIN NOW";s:17:"first_description";s:172:"Consectetur adipisicing elit sed dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua enim poskina ilukita ylokem lokateise ination voluptate velit esse cillum.";s:12:"second_title";s:19:"Start As Freelancer";s:10:"second_url";s:1:"#";s:17:"second_url_button";s:8:"JOIN NOW";s:18:"second_description";s:172:"Consectetur adipisicing elit sed dotem eiusmod tempor incune utnaem labore etdolore maigna aliqua enim poskina ilukita ylokem lokateise ination voluptate velit esse cillum.";s:2:"id";i:4;s:11:"parentIndex";i:3;}',
                    'metable_type' => 'App\Page',
                    'metable_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'sliders0',
                    'meta_value' => Helper::getFirstHomeSlider(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'app_section4',
                    'meta_value' => Helper::getFirstHomeAPP(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'title',
                    'meta_value' => 0,
                    'metable_type' => 'App\Page',
                    'metable_id' => 5,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'freelancers3',
                    'meta_value' => Helper::getSecondHomeFreelancer(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'services1',
                    'meta_value' => Helper::getSecondHomeService(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'work_tabs2',
                    'meta_value' => Helper::getSecondHomeWorkTab(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'sliders0',
                    'meta_value' => Helper::getSecondHomeSlider(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'app_section4',
                    'meta_value' => Helper::getSecondHomeAPP(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'articles5',
                    'meta_value' => Helper::getSecondHomeArticle(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'title',
                    'meta_value' => 0,
                    'metable_type' => 'App\Page',
                    'metable_id' => 6,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'freelancers3',
                    'meta_value' => Helper::getThirdHomeFreelancer(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'services1',
                    'meta_value' => Helper::getThirdHomeService(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'work_videos2',
                    'meta_value' => Helper::getThirdHomeWorkVideo(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'sliders0',
                    'meta_value' => Helper::getThirdHomeSlider(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'app_section4',
                    'meta_value' => Helper::getThirdHomeAPP(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'articles5',
                    'meta_value' => Helper::getThirdHomeArticle(),
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'meta_key' => 'title',
                    'meta_value' => 0,
                    'metable_type' => 'App\Page',
                    'metable_id' => 7,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
