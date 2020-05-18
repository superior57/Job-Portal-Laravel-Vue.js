<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToProposals extends Migration
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
            'proposals',
            function (Blueprint $table) {
                $table->dropColumn('paid');
            }
        );
    }
}
