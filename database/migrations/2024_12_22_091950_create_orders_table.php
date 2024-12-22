<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 8,1);
            $table->text('shipping_address');
            $table->text('shipping_phone');
            $table->integer('order_status')->default(0)->comment('0-pending,1-confirmed,2-shipping,3-delivered,4-cancelled');
            $table->integer('payment_method')->default(0)->comment('0-cod, 1-bank_transfer', 'e_wallet');
            $table->integer('payment_status')->default(0)->comment('0-pending, 1-paid, 2-failed');
            $table->text('notes')->nullable();
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
}
