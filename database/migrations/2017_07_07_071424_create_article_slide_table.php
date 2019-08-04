<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleSlideTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('article_slide', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id');
            $table->string('type', 50)->default('image');
            $table->string('path', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('article_slide');
    }

}
