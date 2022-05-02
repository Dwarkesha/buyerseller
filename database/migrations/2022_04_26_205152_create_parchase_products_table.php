<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParchaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parchase_products', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id')->nullable();
            $table->BigInteger('buyer_id')->unsigned()->nullable();
            $table->BigInteger('seller_id')->unsigned()->nullable();
            $table->BigInteger('product_id')->unsigned()->nullable();
            $table->enum('is_parchase', ['1', '2', '3'])->default('1')->nullable();
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parchase_products');
    }
}
