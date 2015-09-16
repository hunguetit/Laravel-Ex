<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weight');
            $table->string('brakeType');
            $table->string('forks');
            $table->string('frameMaterial');
            $table->string('gender');
            $table->string('numberOfGears');
            $table->string('pedalsIncluded');
            $table->string('suspension');
            $table->string('wheelSize');
            $table->string('chainset');
            $table->string('forkLockOut');
            $table->string('forkTravel');
            $table->string('forksAdjustableDamping');
            $table->string('frontBrake');
            $table->string('frontHub');
            $table->string('frontMech');
            $table->string('gearShifters');
            $table->string('handlebars');
            $table->string('headset');
            $table->string('pedals');
            $table->string('rearBrake');
            $table->string('rearHub');
            $table->string('rearMech');
            $table->string('rims');
            $table->string('saddle');
            $table->string('tyreSize');
            $table->string('tyres');

            $table->integer('product_id')->unsigned();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productDetails');
    }
}
