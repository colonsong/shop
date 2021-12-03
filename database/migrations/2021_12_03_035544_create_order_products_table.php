<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign("order_id")->references("id")->on("orders")->cascadeOnDelete();
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
        // Schema::table('order_products', function(Blueprint $table) {
        //     $table->dropForeign(['product_id']);
        //     $table->dropForeign(['order_id']);
        // });
        Schema::dropIfExists('order_products');
    }
}
