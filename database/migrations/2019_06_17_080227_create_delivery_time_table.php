<?php

/**
 * Class CreateDeliveryTimeTable
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
 * Class CreateDeliveryTimeTable
 */
class CreateDeliveryTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'delivery_times',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('slug');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_times');
    }
}
