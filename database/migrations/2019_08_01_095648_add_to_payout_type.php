<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToPayoutType extends Migration
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
                $table->enum('type', ['job', 'service'])->default('job');
                $table->text('bank_details')->nullable();
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
                $table->dropColumn('type');
                $table->dropColumn('bank_details');
            }
        );
    }
}
