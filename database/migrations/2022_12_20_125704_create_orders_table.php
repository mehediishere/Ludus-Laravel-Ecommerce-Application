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
            $table->string('order_id');
            $table->string('user_id');
            $table->string('coupon_id')->nullable();
            $table->string('order_status');
            $table->string('payment_status');
            $table->string('transaction_id')->nullable();
            $table->integer('total_qty');
            $table->double('delivery_fee',8,2)->default(0.00);
            $table->double('subtotal_price',8,2)->default(0.00);
            $table->double('grand_price',8,2)->default(0.00);
            $table->text('order_note')->nullable();
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
