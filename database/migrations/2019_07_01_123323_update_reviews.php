<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'reviews',
            function (Blueprint $table) {
                $table->enum(
                    'project_type',
                    ['job', 'service']
                )->default('job');
                $table->integer('service_id')->nullable();
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
            'reviews',
            function (Blueprint $table) {
                $table->dropColumn('project_type');
                $table->dropColumn('service_id');
            }
        );
    }
}
