<?php
/**
 * Class TrialInvoiceSeeder.
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
 * Class TrialInvoiceSeeder.
 *
 */
class TrialInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert(
            [
                [
                    'title' => 'Invoice No. 1',
                    'price' => '0',
                    'payer_name' => 'Test Payer',
                    'payer_email' => 'payer@gmail.com',
                    'seller_email' => 'seller@gmail.com',
                    'currency_code' => 'USD',
                    'payer_status' => 'unverified',
                    'transaction_id' => 'xxxx_xxxx_xxxx',
                    'sales_tax' => '0',
                    'invoice_id' => 'xxx_xxx',
                    'shipping_amount' => '0',
                    'handling_amount' => '0',
                    'insurance_amount' => '0',
                    'paypal_fee' => '0',
                    'payment_mode' => 'paypal',
                    'paid' => '1',
                    'type' => 'trial',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
            ]
        );
    }
}
