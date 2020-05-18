<?php

/**
 * Class CreateJobsTable
 *
 * @category Worketic
 *
 * @package Worketic
 * @author  Amentotech <theamentotech@gmail.com>
 * @license http://www.amentotech.com Amentotech
 * @version <1.0.0>
 * @link    http://www.amentotech.com
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateJobsTable
 */
class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'jobs',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index()->nullable();
                $table->string('title');
                $table->string('slug')->unique();
                $table->enum(
                    'status',
                    ['posted', 'hired', 'completed', 'cancelled']
                )->default('posted');
                $table->string('duration');
                $table->enum('project_level', ['basic', 'medium', 'expensive']);
                $table->enum(
                    'freelancer_type',
                    ['pro_independent', 'pro_agency', 'independent', 'agency', 'rising_talent']
                );
                $table->enum(
                    'english_level',
                    ['basic', 'conversational', 'fluent', 'native', 'professional']
                );
                $table->enum('project_type', ['hourly', 'fixed'])->default('fixed');
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
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
