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
            $table->integer('user_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('total_bill')->nullable();
            $table->text('book_type')->nullable();  //cod or bkash
            $table->text('transiction_id')->nullable();
            $table->integer('order_completed')->nullable();  // 0 or 1
            $table->integer('payment_completed')->nullable();  // 0 or 1
            $table->integer('to_provider_id')->nullable();  // provider user id
            $table->integer('provider_completed')->nullable();  // 0 or 1
            $table->integer('is_active')->default(1);
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
