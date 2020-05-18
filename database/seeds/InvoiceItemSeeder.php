<?php
/**
 * Class InvoiceItemSeeder.
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
 * Class InvoiceItemSeeder.
 *
 */
class InvoiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert(
            [
                //Employers
                [
                    'invoice_id' => '1',
                    'product_id' => '1',
                    'subscriber' => '2',
                    'item_name' => 'Trial Employer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '1',
                    'product_id' => '1',
                    'subscriber' => '3',
                    'item_name' => 'Trial Employer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '2',
                    'product_id' => '6',
                    'subscriber' => '4',
                    'item_name' => 'Platinum',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '8',
                    'product_id' => '3',
                    'subscriber' => '4',
                    'item_name' => 'Web Content Developer',
                    'item_price' => '8000',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '3',
                    'product_id' => '7',
                    'subscriber' => '5',
                    'item_name' => 'Silver',
                    'item_price' => '120.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '4',
                    'product_id' => '8',
                    'subscriber' => '6',
                    'item_name' => 'Gold',
                    'item_price' => '180.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '1',
                    'product_id' => '1',
                    'subscriber' => '7',
                    'item_name' => 'Trial Employer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '2',
                    'product_id' => '6',
                    'subscriber' => '8',
                    'item_name' => 'Platinum',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '3',
                    'product_id' => '7',
                    'subscriber' => '9',
                    'item_name' => 'Silver',
                    'item_price' => '120.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '4',
                    'product_id' => '8',
                    'subscriber' => '10',
                    'item_name' => 'Gold',
                    'item_price' => '180.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '1',
                    'product_id' => '1',
                    'subscriber' => '11',
                    'item_name' => 'Trial Employer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '2',
                    'product_id' => '6',
                    'subscriber' => '12',
                    'item_name' => 'Platinum',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                //Freelancers
                [
                    'invoice_id' => '1',
                    'product_id' => '2',
                    'subscriber' => '13',
                    'item_name' => 'Trial Freelancer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '5',
                    'product_id' => '3',
                    'subscriber' => '14',
                    'item_name' => 'Basic',
                    'item_price' => '60.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '6',
                    'product_id' => '4',
                    'subscriber' => '15',
                    'item_name' => 'Plus Members',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '7',
                    'product_id' => '5',
                    'subscriber' => '16',
                    'item_name' => 'Pro Members',
                    'item_price' => '120.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '1',
                    'product_id' => '2',
                    'subscriber' => '17',
                    'item_name' => 'Trial Freelancer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '5',
                    'product_id' => '3',
                    'subscriber' => '18',
                    'item_name' => 'Basic',
                    'item_price' => '60.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '6',
                    'product_id' => '4',
                    'subscriber' => '19',
                    'item_name' => 'Plus Members',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '7',
                    'product_id' => '5',
                    'subscriber' => '20',
                    'item_name' => 'Pro Members',
                    'item_price' => '120.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '1',
                    'product_id' => '2',
                    'subscriber' => '21',
                    'item_name' => 'Trial Freelancer',
                    'item_price' => '0.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '5',
                    'product_id' => '3',
                    'subscriber' => '22',
                    'item_name' => 'Basic',
                    'item_price' => '60.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '6',
                    'product_id' => '4',
                    'subscriber' => '23',
                    'item_name' => 'Plus Members',
                    'item_price' => '90.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'invoice_id' => '7',
                    'product_id' => '5',
                    'subscriber' => '24',
                    'item_name' => 'Pro Members',
                    'item_price' => '120.00',
                    'item_qty' => '1',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
