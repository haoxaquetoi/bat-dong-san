<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_article', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('article_id');
            $table->integer('feedback_id');
            $table->tinyInteger('readed')->default(0);
            $table->text('value')->nullable();
            $table->text('IPClient',25);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_article');
    }
}
