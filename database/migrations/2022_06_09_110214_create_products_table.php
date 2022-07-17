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
            $table->string('name', 50);
            $table->string('unit', 30);
            $table->integer('quantity', false, true);
            $table->integer('quantity_sold', false, true)->default(0);
            $table->double('price', null, null, true);
            $table->string('desc', 200);
            $table->string('avatar', 50)->nullable();
            $table->smallInteger('status')->default(0);
            $table->integer('weight')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('supplier_id')->constrained('suppliers');

            $table->string('color_id', 10)->nullable();
            $table->foreign('color_id')->references('hex')->on('colors');

            $table->string('cpu_id', 15)->nullable();
            $table->foreign('cpu_id')->references('id')->on('cpu');

            $table->string('gpu_id', 15)->nullable();
            $table->foreign('gpu_id')->references('id')->on('gpu');

            $table->string('ram_id', 15)->nullable();
            $table->foreign('ram_id')->references('id')->on('ram');
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
