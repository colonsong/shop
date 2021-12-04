<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id')->index();
            $table->foreign("cart_id")->references("id")->on("carts")->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign("product_id")->references("id")->on("products")->cascadeOnDelete();
            $table->unsignedBigInteger('qty')->default(1);
            $table->string('desc', 500)->nullable();
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
        // Schema::table('cart_product', function(Blueprint $table) {
        //     $table->dropForeign(['product_id']);
        //     $table->dropForeign(['cart_id']);
        // });
        Schema::dropIfExists('cart_product');
    }
}
