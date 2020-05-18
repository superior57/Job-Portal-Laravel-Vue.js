<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidProgressToProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'proposals',
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
            'proposals',
            function (Blueprint $table) {
                $table->dropColumn('paid_progress');
            }
        );
    }
}
