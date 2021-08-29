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
            $table->date('date');
            $table->time('time');
            $table->tinyInteger('total');
            $table->text('description');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->foreign('type_id')->references('type_id')->on('mutation_type');
            $table->foreign('category_id')->references('category_id')->on('category');
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
