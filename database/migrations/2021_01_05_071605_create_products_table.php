<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('proname')->nullable();
            $table->string('brand')->nullable();

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->integer('quantity')->nullable();
            $table->string('weight')->nullable();
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->float('regularprice')->nullable();
            $table->float('salesprice')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', ['pending', 'published', 'out_of_stock', 'in_stock'])->default('in_stock');
            $table->softDeletes();
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
