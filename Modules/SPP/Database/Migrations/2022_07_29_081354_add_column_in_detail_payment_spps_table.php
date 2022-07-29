<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInDetailPaymentSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_payment_spps', function (Blueprint $table) {
            $table->string('sender')->after('user_id')->nullable();
            $table->string('bank_sender')->after('sender')->nullable();
            $table->string('destination_bank')->after('bank_sender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_payment_spps', function (Blueprint $table) {

        });
    }
}
