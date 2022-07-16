<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_spps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('year');
            $table->boolean('is_active');
            $table->enum('jan',['paid','unpaid','free']);
            $table->enum('feb',['paid','unpaid','free']);
            $table->enum('mar',['paid','unpaid','free']);
            $table->enum('apr',['paid','unpaid','free']);
            $table->enum('mei',['paid','unpaid','free']);
            $table->enum('jun',['paid','unpaid','free']);
            $table->enum('jul',['paid','unpaid','free']);
            $table->enum('ags',['paid','unpaid','free']);
            $table->enum('sep',['paid','unpaid','free']);
            $table->enum('oct',['paid','unpaid','free']);
            $table->enum('nov',['paid','unpaid','free']);
            $table->enum('dec',['paid','unpaid','free']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_spps');
    }
}
