<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOuTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ou', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('code', 50);
            $table->integer('parent_id')->default(0);
            $table->string('dep')->nullable();
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('ou');
    }

}
