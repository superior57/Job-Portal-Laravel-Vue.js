<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePayouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'payouts',
            function (Blueprint $table) {
                $table->integer('order_id')->nullable();  
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
        Schema::table(
            'payouts',
            function (Blueprint $table) {
                $table->dropColumn('order_id');
            }
        );
    }
}
