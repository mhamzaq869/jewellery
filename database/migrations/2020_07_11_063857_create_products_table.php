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
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('images');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->float('unit_price');
            $table->float('price');
            $table->float('discount')->nullabale();
            $table->integer('quantity')->default(1);
            $table->enum('condition',['default','new_arrival','hot'])->default('default');
            $table->string('size')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status',['1','0'])->default('0');
            $table->boolean('is_featured')->deault(0);
            $table->string('shipping')->default(0);
            $table->string('shipping_days')->default(0);
            $table->string('return')->default(0);
            $table->string('return_days')->default(0);
            $table->string('tax')->default(0);
            $table->string('tax_type')->default(0);
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
