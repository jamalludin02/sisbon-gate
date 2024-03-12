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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nip',20)->unique();
            $table->string('nama');
            $table->date('tgl_lahir')->date_format('Y-m-d');
            $table->enum('pendidikan',array('SMA/SMK','D4','S1','S2','S3'));
            $table->enum('gender',array('L','P'));
            $table->string('no_telp',15);
            $table->string('alamat', 255);
            $table->bigInteger('jabatan_id')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
