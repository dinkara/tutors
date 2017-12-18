<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('comments_sentences', function (Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
       
        });
        Schema::table('password_resets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('sentences', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('sentences_categories', function (Blueprint $table) {
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
       
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('students_comments', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('comments')->onDelete('cascade');
       
        });
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       
        });
        Schema::table('users_roles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
       
        });
        Schema::table('users_social_networks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('social_network_id')->references('id')->on('social_networks')->onDelete('cascade');
       
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('comments_sentences', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
            $table->dropForeign(['sentence_id']);

        });
        Schema::table('password_resets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('sentences', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('sentences_categories', function (Blueprint $table) {
            $table->dropForeign(['sentence_id']);
            $table->dropForeign(['category_id']);

        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('students_comments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['review_id']);

        });
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

        });
        Schema::table('users_roles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['role_id']);

        });
        Schema::table('users_social_networks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['social_network_id']);

        });

    }
}
