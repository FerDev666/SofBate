<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesTable extends Migration
{
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unsigned();
            $table->string('name', 128);
            $table->tinyInteger('amperage')->nullable();
            $table->integer('brand_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('battery_brands')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('model_id')->references('id')->on('battery_models')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('batteries');
    }
}
