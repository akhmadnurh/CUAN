<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_credits', function (Blueprint $table) {
            $table->increments('debt_id');
            $table->tinyInteger('nominal');
            $table->tinyInteger('paid');
            $table->foreign('status_id')->references('status_id')->on('debt_credit_status');
            $table->foreign('user_id')->references('user_id')->on('user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debt_credits');
    }
}
