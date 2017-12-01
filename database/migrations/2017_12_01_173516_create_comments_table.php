<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('text')->nullable('1');
            $table->string('caption',150)->nullable('1');
            $table->boolean('favorite')->default();
            $table->integer('user_id')->unsigned();
            $table->integer('score')->default('1');
            $table->integer('count')->default()->unsigned('1');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        Schema::dropIfExists('comments');
    }
}
