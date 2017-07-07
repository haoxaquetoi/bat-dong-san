<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlerTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler', function (Blueprint $table) {
        $table->increments('id');
        $table->string('website_name', 255);
        $table->string('website_url', 255);
        $table->tinyInteger('deleted')->default(0);
        $table->datetime('deleted_at')->nullable();
        $table->datetime('created_at');
        $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crawler');
    }

}
