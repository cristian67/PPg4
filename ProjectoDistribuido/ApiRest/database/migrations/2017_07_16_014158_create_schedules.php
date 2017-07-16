<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   	{
   		Schema::create('schedules', function(Blueprint $table)
   		{
   			$table->increments('id');

               $table->tinyInteger('dia');
               $table->tinyInteger('periodo_1')->nullable();
               $table->tinyInteger('periodo_2')->nullable();
               $table->tinyInteger('periodo_3')->nullable();
               $table->tinyInteger('periodo_4')->nullable();
               $table->tinyInteger('periodo_5')->nullable();
               $table->tinyInteger('periodo_6')->nullable();
               $table->tinyInteger('periodo_7')->nullable();
               $table->tinyInteger('periodo_8')->nullable();
               //Relacion curso-salas
               $table->integer('course_2_id')->unsigned();
               $table->integer('class_id')->unsigned();
   		});

   		Schema::table('schedules', function($table){
   				$table->foreign('course_2_id')->references('id')->on('courses');
   				$table->foreign('class_id')->references('id')->on('classrooms');
   		});
   	}

 	/**
 	 * Reverse the migrations.
 	 *
 	 * @return void
 	 */
   	public function down()
   	{
   		Schema::drop('schedules');
   	}
}
