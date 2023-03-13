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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderCode');
            $table->integer('productId');
            $table->integer('userId');
            $table->string('quantity');
            $table->string('price');
            $table->string('OrderRemarks')->default(date('Y-m-d') );
            $table->string('payment_status');
            $table->string('address')->nullable();
            $table->string('VerifiedRemarks')->nullable();
            $table->string('ApproveRemarks')->nullable();
            $table->string('RejectedRemarks')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
