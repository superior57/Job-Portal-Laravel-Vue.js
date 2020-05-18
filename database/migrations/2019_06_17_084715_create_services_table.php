<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'services',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('slug')->unique();
                $table->enum(
                    'status',
                    ['published', 'draft']
                )->default('published');
                $table->integer('delivery_time_id');
                $table->integer('response_time_id');
                $table->enum(
                    'english_level',
                    ['basic', 'conversational', 'fluent', 'native', 'professional']
                );
                $table->integer('price');
                $table->text('description')->nullable();
                $table->integer('location_id')->nullable();
                $table->string('address');
                $table->string('longitude');
                $table->string('latitude');
                $table->text('is_featured')->nullable('true');
                $table->text('show_attachments')->nullable('false');
                $table->text('attachments')->nullable();
                $table->string('code');
                $table->integer('views')->default(0);
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
        Schema::dropIfExists('services');
    }
}
