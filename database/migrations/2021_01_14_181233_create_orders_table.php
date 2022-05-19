<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('order_number');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->foreign('shipping_id')->references('id')->on('shipping_addresses')->onDelete('cascade')->nullable();

            // $table->unsignedBigInteger('delivery_id')->nullable();
            // $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade')->nullable();

            $table->enum('type', ['standard', 'gift']);

            $table->integer('item_count')->nullable();
            $table->integer('grand_total')->nullable();
            $table->date('delivery_date')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->enum('status', ['pending', 'confirmed', 'processing', 'ready_dispatch', 'dispatched', 'on_the_way', 'delivered', 'received', 'cancelled', 'decline'])->default('pending');
            $table->enum('payment_method', ['cash_on_delivery', 'card'])->default('cash_on_delivery');
            $table->string('notes')->nullable();
            $table->string('sender_details')->nullable();
            $table->float('delivery_fee')->nullable();

            // $table->unsignedBigInteger('billing_id');
            // $table->foreign('billing_id')->references('id')->on('billing_addresses')->onDelete('cascade');



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
        Schema::dropIfExists('orders');
    }
}
