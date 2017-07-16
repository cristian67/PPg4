<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
   	{
   		Schema::create('courses', function(Blueprint $table)
   		{
   			$table->increments('id');
   			$table->string('nombre',255);
   			$table->string('codigo');
   			$table->integer('periodos');
   		});
   	}

   	/**
   	 * Reverse the migrations.
   	 *
   	 * @return void
   	 */
     	public function down()
     	{
     		Schema::drop('courses');
     	}
}
