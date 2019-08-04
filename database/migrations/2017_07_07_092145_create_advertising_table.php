<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('url', 500);
            $table->datetime('begin_date');
            $table->datetime('end_date');
            $table->string('file_path', 500);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('advertising');
    }
}
