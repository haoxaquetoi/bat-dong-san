<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlerConfigTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('crawler_config', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('category_id');
            $table->string('website_code', 255);
            $table->text('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('crawler_config');
    }

}
