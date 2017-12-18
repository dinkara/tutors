<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateStudentsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('students_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('student_id')->unsigned();
            $table->integer('review_id')->unsigned();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        Schema::dropIfExists('students_comments');
    }
}
