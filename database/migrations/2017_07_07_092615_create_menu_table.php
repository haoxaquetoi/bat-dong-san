<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('type', 50);
            $table->integer('position_id');
            $table->integer('parent')->default(0);
            $table->integer('order');
            $table->string('depth', 255)->default('/');
            $table->string('value', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
