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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('periode_id')->unsigned();
            $table->foreign('periode_id')->references('id')->on('periode_penilaian')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('kriteria_id')->unsigned();
            $table->foreign('kriteria_id')->references('id')->on('kriteria_penilaian')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('nilai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
