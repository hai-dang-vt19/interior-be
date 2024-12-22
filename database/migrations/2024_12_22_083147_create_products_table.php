<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->comment('Reference Categories');
            $table->string('product_name');
            $table->text('product_description')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('discount_percent')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('product_status')->default(0)->comment('0-Active, 1-Inactive, 3-OutOfStock');
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
        Schema::dropIfExists('products');
    }
}
