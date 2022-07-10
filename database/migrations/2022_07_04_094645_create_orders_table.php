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
            $table->string('customer_name', 50);
            $table->string('email', 50);
            $table->string('phone_number', 20);
            $table->string('address', 50);
            $table->string('city', 30);
            $table->string('country', 30);
            $table->string('discount_code', 20)->nullable();
            $table->double('discount_price')->nullable();
            $table->string('payment_method', 20);
            $table->text('note')->nullable();
            $table->double('total_price');
            $table->smallInteger('status')->default(0);
            $table->string('desc_cancel', 50)->nullable();

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('user_id')->on('users');

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id')->references('user_id')->on('users');
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
