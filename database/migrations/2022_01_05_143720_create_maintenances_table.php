<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->boolean('oil_changes')->default(false);
            $table->boolean('tire_rotations')->default(false);
            $table->boolean('tune_ups')->default(false);
            $table->boolean('repairs')->default(false);
            $table->longText('notes')->nullable();
            $table->timestamp('date_completed')->useCurrent();
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
