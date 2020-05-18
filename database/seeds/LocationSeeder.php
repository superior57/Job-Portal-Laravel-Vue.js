<?php
/**
 * Class LocationSeeder.
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
 * Class LocationSeeder
 */
class LocationSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locations')->insert(
            [
                [
                    'title' => 'Australia',
                    'slug'  => 'australia',
                    'parent'  => 0,
                    'flag'  => 'aus.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Canada',
                    'slug'  => 'canada',
                    'parent'  => 0,
                    'flag'  => 'can.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'England',
                    'slug'  => 'england',
                    'parent'  => 0,
                    'flag'  => 'eng.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'India',
                    'slug'  => 'india',
                    'parent'  => 0,
                    'flag'  => 'in.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'Turkey',
                    'slug'  => 'turkey',
                    'parent'  => 0,
                    'flag'  => 'tu.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'United Emirates',
                    'slug'  => 'united-emirates',
                    'parent'  => 0,
                    'flag'  => 'ue.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'United Kingdom',
                    'slug'  => 'united-kingdom',
                    'parent'  => 0,
                    'flag'  => 'uk.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'United States',
                    'slug'  => 'united-states',
                    'parent'  => 0,
                    'flag'  => 'us.png',
                    'description'  => null,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }

}
