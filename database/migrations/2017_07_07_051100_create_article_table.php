<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->datetime('begin_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('status', 7)->default('Trash');
            $table->tinyInteger('deleted')->default(0);
            $table->datetime('created_at');
            $table->datetime('updated_at')->nullable();
            $table->datetime('deleted_at')->nullable();
            $table->tinyInteger('is_sticky')->default(0);
            $table->tinyInteger('is_censored')->default(0);
            $table->tinyInteger('is_sold')->default(0);
            $table->string('thumbnail', 500)->nullable();
            $table->string('type', 7)->default('Product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('article');
    }

}
