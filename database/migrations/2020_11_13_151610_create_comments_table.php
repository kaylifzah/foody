<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id'); //this is the buyerID or the user_id of the person commenting
            $table->unsignedBigInteger('foodPost_id'); //this is the ID of the food that you are ordering
            $table->unsignedBigInteger('seller_id'); //this is the ID of the person selling
            $table->unsignedInteger('purchaseqty');
            $table->time('pickupTime');
            $table->unsignedBigInteger('contact');
            $table->string('paymentScreenS');
            $table->unsignedBigInteger('paymentRef');
            
            $table->timestamps();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('foodPost_id')->references('id')->on('foodposts');
            //$table->foreign('seller_id')->references('user_id')->on('foodposts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
