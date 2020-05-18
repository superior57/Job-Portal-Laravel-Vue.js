<?php
/**
 * Class ProposalSeeder.
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
 * Class ProposalSeeder
 */
class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposals')->insert(
            [
                [
                    'freelancer_id' => 21,
                    'job_id' => 3,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in risus id mauris convallis sollicitudin. Etiam porta, massa finibus bibendum fermentum, velit diam hendrerit libero, eu consectetur sapien velit ac nibh. Ut in volutpat nisi, et suscipit libero. In molestie blandit elit in condimentum. Vivamus cursus ultrices risus sed consectetur. Etiam hendrerit erat tellus. Nullam iaculis mauris sed elit consequat tempus. In hac habitasse platea dictumst. Donec nibh augue, tristique vel metus ut, bibendum pellentesque dolor. Sed id pharetra dolor, vel tincidunt nisi. Suspendisse potenti. Quisque eu blandit magna, eget porttitor urna.

                    Morbi tincidunt finibus dapibus. Proin sit amet sagittis erat. In at velit tincidunt, ultrices lacus in, convallis tortor. Donec placerat, massa eu tincidunt volutpat, lectus nibh commodo nisl, quis fermentum neque quam et erat. In vel dictum dui. In hac habitasse platea dictumst. Suspendisse vel libero libero.',
                    'amount' => '8000',
                    'completion_time' => 'weekly',
                    'attachments' => 'a:3:{i:0;s:39:"1555913141-demo-import-in-WordPress.zip";i:1;s:52:"1555913141-How-to-run-mysql-command-in-database.docx";i:2;s:38:"1555913141-WordPress-customization.pdf";}',
                    'hired' => 1,
                    'status' => 'hired',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ]
            ]
        );
    }
}
