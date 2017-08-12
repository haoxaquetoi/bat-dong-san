<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_other', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id');
            $table->integer('facade')->nullable();
            $table->integer('floor_area')->nullable(); //Diện tích mặt sàn; diện tích nhà
            $table->integer('entry_width')->nullable();
            $table->string('house_direction', 50)->nullable();
            $table->string('balcony_direction', 50)->nullable();
            $table->integer('number_of_storeys')->nullable();
            $table->integer('number_of_wc')->nullable();
            $table->integer('number_of_bedrooms')->nullable();
            $table->text('furniture')->nullable();
            $table->integer('floor_area')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_other');
    }
}
