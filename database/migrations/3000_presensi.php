<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->date('tgl');
            $table->enum('status',array('HADIR','ALPA','SAKIT','IZIN','CUTI'))->default('HADIR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
