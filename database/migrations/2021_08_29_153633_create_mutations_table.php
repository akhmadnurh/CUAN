<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutations', function (Blueprint $table) {
            $table->increments('mutation_id');
            $table->tinyInteger('user_id');
            $table->tinyInteger('type_id');
            $table->tinyInteger('category_id');
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->integer('total');

//            $table->foreign('user_id')->references('user_id')->on('users');
//            $table->foreign('type_id')->references('type_id')->on('mutation_types');
//            $table->foreign('category_id')->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutations');
    }
}
