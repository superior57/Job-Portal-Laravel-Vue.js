<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'profiles',
            function (Blueprint $table) {
                $table->text('saved_services')->nullable();
                $table->text('ratings')->nullable();
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
            'profiles',
            function (Blueprint $table) {
                $table->dropColumn('saved_services');
                $table->dropColumn('ratings');
            }
        );
    }
}
