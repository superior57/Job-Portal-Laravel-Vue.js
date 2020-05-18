<?php
/**
 * Class PrivateMessagesSeeder.
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
 * Class PrivateMessagesSeeder
 */
class PrivateMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('private_messages')->insert(
            [
                [
                    'author_id' => 4,
                    'proposal_id' => 1,
                    'content' => '<p><span style="font-family: "Open Sans", Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in risus id mauris convallis sollicitudin. Etiam porta, massa finibus bibendum fermentum, velit diam hendrerit libero, eu consectetur sapien velit ac nibh. Ut in volutpat nisi, et suscipit libero.</span></p>',
                    'attachments' => null,
                    'notify' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'author_id' => 21,
                    'proposal_id' => 1,
                    'content' => 'Donec placerat, massa eu tincidunt volutpat.',
                    'attachments' => 'a:1:{i:0;s:52:"1555913392-How-to-run-mysql-command-in-database.docx";}',
                    'notify' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'author_id' => 4,
                    'proposal_id' => 1,
                    'content' => 'Donec placerat, massa eu tincidunt volutpat.',
                    'attachments' => null,
                    'notify' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'author_id' => 21,
                    'proposal_id' => 1,
                    'content' => 'Donec placerat, massa eu tincidunt volutpat.',
                    'attachments' => 'a:1:{i:0;s:52:"1555913456-How-to-run-mysql-command-in-database.docx";}',
                    'notify' => '0',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
            ]
        );
    }
}
