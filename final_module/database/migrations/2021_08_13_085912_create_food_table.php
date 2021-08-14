<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('restaurant_id')->nullable();

            $table->integer('price')->default(0);
            $table->integer('price_discount')->default(0);
            $table->integer('sell_quantity')->default(0);
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('on_sale')->nullable();

            $table->unsignedInteger('user_id');
            $table->integer('time_preparation')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->string('coupon')->nullable();
            $table->integer('count_coupon')->default(0);

            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('foods');
    }
}
