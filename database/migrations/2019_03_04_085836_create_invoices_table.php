<?php

/**
 * Class CreateInvoicesTable
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @version <1.0.0>
 * @link    http://www.amentotech.com
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateInvoicesTable
 */
class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->double('price', 2);
            $table->string('payer_name');
            $table->string('payer_email');
            $table->string('seller_email');
            $table->string('currency_code');
            $table->string('payer_status')->nullable();
            $table->string('transaction_id');
            $table->double('sales_tax', 2);
            $table->string('invoice_id');
            $table->string('customer_id')->nullable();
            $table->double('shipping_amount', 2)->nullable();
            $table->double('handling_amount', 2)->nullable();
            $table->double('insurance_amount', 2)->nullable();
            $table->double('paypal_fee', 2);
            $table->string('payment_mode');
            $table->boolean('paid');
            $table->enum(
                'type',
                ['trial', 'package', 'project']
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
