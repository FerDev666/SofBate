<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni', 32);
            $table->enum('issued', ['SC', 'LPZ', 'CBBA', 'BNI', 'CHQ', 'ORU', 'PND', 'PSI', 'TJA'])->nullable();
            $table->string('name', 128);
            $table->string('lastname', 128);
            $table->string('phone', 32);
            $table->integer('city_id')->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
