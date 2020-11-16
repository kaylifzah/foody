<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodposts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('foodName');
            $table->string('foodpic');
            $table->unsignedDecimal('price', 5,2);
            $table->unsignedInteger('qty');
            $table->text('description');
            $table->text('location');
            $table->text('address');
            $table->string('postalCode', 6);
            $table->date('availDate');
            $table->time('collectTimeFrom');
            $table->time('collectTimeTo');
            $table->unsignedBigInteger('payAcc');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodposts');
    }
}
