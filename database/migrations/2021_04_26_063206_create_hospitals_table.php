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
            $table->string('name')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->longText('description')->nullable();
            $table->integer('beds')->nullable();
            $table->integer('bed_oxygen')->nullable();
            $table->integer('bed_nono')->nullable();
            $table->integer('bed_ac')->nullable();
            $table->integer('bed_noac')->nullable();
            $table->integer('icu')->nullable();
            $table->integer('vantilator')->nullable();
            $table->double('price', 15, 8)->nullable();
            $table->mediumText('address')->nullable();
            $table->mediumText('landmark')->nullable();
            $table->string('status')->nullable();
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
