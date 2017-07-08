<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlerConfigTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_config', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('crawler_id');
            $table->integer('category_id');
            $table->string('category_xpath',500);
            $table->string('detail_post_xpath',500);
            $table->string('url', 500);
            $table->string('column_name', 50);
            $table->string('xpath', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crawler_config');
    }

}
