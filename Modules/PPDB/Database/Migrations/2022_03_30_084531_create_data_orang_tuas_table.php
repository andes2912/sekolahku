<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataOrangTuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_ayah')->nullable();
            $table->enum('pendidikan_ayah',['SD','SMP','SMA/SMK','S1','S2','S3'])->nullable();
            $table->string('telp_ayah')->nullable();
            $table->enum('pekerjaan_ayah',['Wiraswasta','Wirausaha','ASN','Buruh'])->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->enum('pendidikan_ibu',['SD','SMP','SMA/SMK','S1','S2','S3'])->nullable();
            $table->string('telp_ibu')->nullable();
            $table->enum('pekerjaan_ibu',['Ibu Rumah Tangga','Wiraswasta','Wirausaha','ASN','Buruh'])->nullable();
            $table->string('alamat_ibu')->nullable();
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
        Schema::dropIfExists('data_orang_tuas');
    }
}
