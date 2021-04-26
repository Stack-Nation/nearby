<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("Admin");
            $table->string('email')->unique()->default("admin@nearby.com");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default("$2y$10$2XjJVCbg92f1nC.zyLyjveQAFc7SQdqKpR6xZyEDrTi/dWaWF9NKm");
            $table->string('role')->default("Admin");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
