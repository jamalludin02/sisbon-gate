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
        Schema::create('kriteria_penilaian', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('kriteria');
            $table->longText('deskripsi');
            $table->integer('bobot')->range(1,5);
            $table->enum('status',array('BENEFIT','COST'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_penilaian');
    }
};
