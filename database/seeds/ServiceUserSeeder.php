<?php
/**
 * Class ServiceUserSeeder.
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

/**
 * Class ServiceUserSeeder
 */
class ServiceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_user')->insert(
            [
                [
                    'service_id' => 1,
                    'user_id' => 21,
                    'seller_id' => 21,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 2,
                    'user_id' => 21,
                    'seller_id' => 21,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 3,
                    'user_id' => 21,
                    'seller_id' => 21,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 4,
                    'user_id' => 21,
                    'seller_id' => 21,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 5,
                    'user_id' => 22,
                    'seller_id' => 22,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 6,
                    'user_id' => 22,
                    'seller_id' => 22,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 7,
                    'user_id' => 22,
                    'seller_id' => 22,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 8,
                    'user_id' => 22,
                    'seller_id' => 22,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 9,
                    'user_id' => 13,
                    'seller_id' => 13,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 10,
                    'user_id' => 13,
                    'seller_id' => 13,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 11,
                    'user_id' => 13,
                    'seller_id' => 13,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 12,
                    'user_id' => 13,
                    'seller_id' => 13,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 13,
                    'user_id' => 14,
                    'seller_id' => 14,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 14,
                    'user_id' => 14,
                    'seller_id' => 14,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 15,
                    'user_id' => 14,
                    'seller_id' => 14,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 16,
                    'user_id' => 14,
                    'seller_id' => 14,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 17,
                    'user_id' => 15,
                    'seller_id' => 15,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 18,
                    'user_id' => 15,
                    'seller_id' => 15,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 19,
                    'user_id' => 15,
                    'seller_id' => 15,
                    'type' => 'seller',
                    'status' => 'published',
                ],
                [
                    'service_id' => 20,
                    'user_id' => 15,
                    'seller_id' => 15,
                    'type' => 'seller',
                    'status' => 'published',
                ],
            ]
        );
    }
}
