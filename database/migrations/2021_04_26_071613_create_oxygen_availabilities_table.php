<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOxygenAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oxygen_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->double('price', 15, 8);
            $table->string('per');
            $table->string('image');
            $table->longText('description');
            $table->mediumText('address');
            $table->string('pin_code');
            $table->string('landmark');
            $table->string('status');
            $table->integer('reports')->default(0);
            $table->boolean('visibility')->default(1);
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
        Schema::dropIfExists('oxygen_availabilities');
    }
}
