<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Support\Enum\ReviewsSentenceJoiners;


class CreateCommentsSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('comments_sentences', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('review_id')->unsigned();
            $table->integer('sentence_id')->unsigned();
            $table->integer('order')->unsigned('1');
            $table->enum('joiner' ,ReviewsSentenceJoiners::all())->nullable('1');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        Schema::dropIfExists('comments_sentences');
    }
}
