<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldJenjangInDataMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_murids', function (Blueprint $table) {
            $table->enum('jenjang', ['SD', 'SMP', 'SMA', 'SMK'])->after('nisn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_murids', function (Blueprint $table) {
            //
        });
    }
}
