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
            $table->integer('user_id')->nullable();
            $table->string('order_number')->unique();
            $table->text('billing_address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('shippment')->nullable();
            $table->string('tax')->nullable();
            $table->string('total');
            $table->text('note');
            $table->string('payment_method')->nullable();
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->string('status')->default('new');
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
