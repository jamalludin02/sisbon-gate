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
        Schema::create('periode_penilaian', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('tahun', false, true)->length(4);
            $table->integer('bulan')->range(1,12);
            $table->date('terbit')->date_format('d-m-Y');
            $table->date('tutup')->date_format('d-m-Y');
            $table->enum('status',array('DIBUKA','DITUTUP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_penilaian');
    }
};
