<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
 	{
 		Schema::create('sections', function(Blueprint $table)
 		{
 			$table->increments('id');
 			$table->integer('seccion');
 			//relacion Profe-curso
       $table->integer('teacher_1_id')->unsigned();
       $table->integer('course_1_id')->unsigned();
 		});

 		Schema::table('sections', function($table){
 			$table->foreign('teacher_1_id')->references('id')->on('teachers');
 			$table->foreign('course_1_id')->references('id')->on('courses');
 		});
 	}

 	/**
 	 * Reverse the migrations.
 	 *
 	 * @return void
 	 */
 	public function down()
 	{
 		Schema::drop('sections');
 	}
}
