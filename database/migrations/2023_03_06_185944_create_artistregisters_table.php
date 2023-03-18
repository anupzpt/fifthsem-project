<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistregisters', function (Blueprint $table) {
            // $table->id();
            $table->string("name")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("contact")->nullable();
            $table->string("address")->nullable();
            $table->string("id")->primary();
            $table->string("user_type")->nullable()->default('0');
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
        Schema::dropIfExists('artistregisters');
    }
};
