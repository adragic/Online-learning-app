<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('answer_body');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('user_id');
            
           
        });
     /*  Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });*/
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
