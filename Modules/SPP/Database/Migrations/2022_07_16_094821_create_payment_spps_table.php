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
            $table->enum('jan',['paid','unpaid','free'])->default('unpaid');
            $table->enum('feb',['paid','unpaid','free'])->default('unpaid');
            $table->enum('mar',['paid','unpaid','free'])->default('unpaid');
            $table->enum('apr',['paid','unpaid','free'])->default('unpaid');
            $table->enum('mei',['paid','unpaid','free'])->default('unpaid');
            $table->enum('jun',['paid','unpaid','free'])->default('unpaid');
            $table->enum('jul',['paid','unpaid','free'])->default('unpaid');
            $table->enum('ags',['paid','unpaid','free'])->default('unpaid');
            $table->enum('sep',['paid','unpaid','free'])->default('unpaid');
            $table->enum('oct',['paid','unpaid','free'])->default('unpaid');
            $table->enum('nov',['paid','unpaid','free'])->default('unpaid');
            $table->enum('dec',['paid','unpaid','free'])->default('unpaid');
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
