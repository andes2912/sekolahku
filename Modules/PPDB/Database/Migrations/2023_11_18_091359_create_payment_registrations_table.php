<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_registrations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('jenjang');
            $table->string('sender')->nullable();
            $table->string('destination_bank')->nullable();
            $table->string('file')->nullable();
            $table->string('approve_date')->nullable();
            $table->string('amount');
            $table->enum('status', ['Paid', 'Unpaid'])->default('Unpaid');

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
        Schema::dropIfExists('payment_registrations');
    }
}
