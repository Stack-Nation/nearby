<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('type');
            $table->string('hours');
            $table->string('diet');
            $table->string('delivery');
            $table->longText('description');
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
        Schema::dropIfExists('meals');
    }
}