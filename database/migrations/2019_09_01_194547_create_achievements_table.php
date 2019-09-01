<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_monitor');
            $table->foreign('id_monitor')
                ->references('id')
                ->on('monitors');

            $table->unsignedBigInteger('id_gem');
            $table->foreign('id_gem')
                ->references('id')
                ->on('gems');

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
        Schema::dropIfExists('achievements');
    }
}
