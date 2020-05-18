<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToServiceUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'service_user',
            function (Blueprint $table) {
                $table->enum(
                    'paid',
                    ['pending', 'completed']
                )->nullable();
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
            'service_user',
            function (Blueprint $table) {
                $table->dropColumn('paid');
            }
        );
    }
}
