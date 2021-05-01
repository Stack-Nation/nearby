<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_name');
            $table->string('phone');
            $table->longText('description');
            $table->integer('beds');
            $table->integer('bed_oxygen');
            $table->integer('bed_nono');
            $table->integer('bed_ac');
            $table->integer('bed_noac');
            $table->integer('icu');
            $table->integer('vantilator');
            $table->double('price', 15, 8);
            $table->mediumText('address');
            $table->string('pin_code');
            $table->string('landmark');
            $table->string('status');
            $table->integer('reports')->default(0);
            $table->boolean('visibility')->default(1);
            $table->boolean('verification')->default(0);
            $table->boolean('verified')->default(0);
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
        Schema::dropIfExists('hospitals');
    }
}
