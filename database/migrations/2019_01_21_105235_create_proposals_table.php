<?php

/**
 * Class CreateProposalsTable
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
 * Class CreateProposalsTable
 */
class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'proposals', 
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('freelancer_id');
                $table->integer('job_id');
                $table->text('content');
                $table->integer('amount');
                $table->string('completion_time');
                $table->text('attachments')->nullable();
                $table->boolean('hired')->default(0);
                $table->enum(
                    'status',
                    ['pending', 'hired', 'completed', 'cancelled']
                )->default('pending');
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
        Schema::dropIfExists('proposals');
    }
}
