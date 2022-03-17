<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_rubrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('rubric_id');

            $table->index('news_id','rubric_news_news_idx');
            $table->index('rubric_id','rubric_news_rubric_idx');

            $table->foreign('news_id','rubric_news_news_fk')->on('news')->references('id')->onDelete('cascade');
            $table->foreign('rubric_id','rubric_news_rubric_fk')->on('rubrics')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_rubrics');
    }
}
