<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->string('license_plate', 64);
            $table->integer('cylinder')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('vehicle_brands')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('model_id')->references('id')->on('vehicle_models')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('vehicle_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
