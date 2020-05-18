<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidProgressToServiceUser extends Migration
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
                    'paid_progress',
                    ['in-progress', 'completed']
                )->default('in-progress');
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
                $table->dropColumn('paid_progress');
            }
        );
    }
}
