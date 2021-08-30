<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutation_details', function (Blueprint $table) {
            $table->integer('mutation_id');
            $table->integer('nominal');
            $table->text('detail_desc');
//            $table->foreign('mutation_id')->references('mutation_id')->on('mutations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutation_details');
    }
}
