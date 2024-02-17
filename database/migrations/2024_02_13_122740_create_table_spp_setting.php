<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSppSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spp_setting', function (Blueprint $table) {
            $table->id();
            $table->integer('amount')->default(0);
            $table->unsignedBigInteger('update_by');
            $table->timestamps();
            $table->foreign('update_by')
                ->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_spp_setting');
    }
}
