<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'service_user',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('service_id');
                $table->integer('user_id');
                $table->integer('seller_id');
                $table->enum(
                    'type',
                    ['seller', 'employer']
                )->default('seller');
                $table->enum(
                    'status',
                    ['hired', 'completed', 'cancelled', 'pending', 'published']
                )->default('pending');
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
        Schema::dropIfExists('service_user');
    }
}
