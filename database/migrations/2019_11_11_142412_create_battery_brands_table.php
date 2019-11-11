<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryBrandsTable extends Migration
{
    public function up()
    {
        Schema::create('battery_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('battery_brands');
    }
}
