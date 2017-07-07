<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_base', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id');
            $table->integer('city_id');
            $table->integer('district_id');
            $table->integer('village_id');
            $table->integer('street_id');
            $table->text('address')->nullable();
            $table->double('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_base');
    }
}
