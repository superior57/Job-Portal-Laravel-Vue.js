<?php

/**
 * Class Profile
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
 * Class Profile
 */
class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'profiles', 
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->nullable();
                $table->integer('department_id')->nullable();
                $table->integer('no_of_employees')->nullable();
                $table->string('freelancer_type')->nullable();
                $table->enum(
                    'english_level',
                    ['basic', 'conversational', 'fluent', 'native', 'professional']
                )
                    ->nullable();
                $table->integer('hourly_rate')->nullable();
                $table->text('experience')->nullable();
                $table->text('education')->nullable();
                $table->text('awards')->nullable();
                $table->text('projects')->nullable();
                $table->text('saved_freelancer')->nullable();
                $table->text('offers')->nullable();
                $table->text('saved_jobs')->nullable();
                $table->text('saved_employers')->nullable();
                $table->integer('rating')->nullable();
                $table->string('address')->nullable();
                $table->string('longitude')->nullable();
                $table->string('latitude')->nullable();
                $table->string('avater')->nullable();
                $table->string('banner')->nullable();
                $table->string('gender')->nullable();
                $table->string('tagline')->nullable();
                $table->text('description')->nullable();
                $table->string('delete_reason')->nullable();
                $table->string('delete_description')->nullable();
                $table->string('payout_id')->nullable();
                $table->text('profile_searchable')->nullable('true');
                $table->text('profile_blocked')->nullable('false');
                $table->text('weekly_alerts')->nullable('true');
                $table->text('message_alerts')->nullable('false');
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
        Schema::dropIfExists('profiles');
    }
}
