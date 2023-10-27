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
            $table->string('order_id');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('stripe_checkout_id');
            $table->string('email');
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('last_name2')->nullable();
            $table->string('address2')->nullable();
            $table->string('country2')->nullable();
            $table->string('city2')->nullable();
            $table->string('postal_code2')->nullable();
            $table->text('notes')->nullable();
            $table->string('stripe_status');
            $table->string('order_status')->default('pending');
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
