<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('slug',255);
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('type', 50);
            $table->integer('order')->default(0);
            $table->string('depth', 255)->default('/');
            $table->tinyInteger('deleted')->default(0);
            $table->dateTime('deleted_at')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }

}
