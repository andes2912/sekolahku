<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToDataMurids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_murids', function (Blueprint $table) {
            $table->enum('proses',['Pendaftaran','Berkas','Murid','Ditolak'])->after('asal_sekolah')->default('Pendaftaran');
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
