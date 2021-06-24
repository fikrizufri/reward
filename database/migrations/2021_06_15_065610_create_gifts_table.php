<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->integer('jumlah');
            $table->string('pic');
            $table->timestamps();
        });

        Schema::create('rewards_gifts', function (Blueprint $table) {

            $table->string('reward_id')->references('id')->on('rewards')->onDelete('cascade');
            $table->string('gift_id')->references('id')->on('gifts')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['reward_id', 'gift_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
