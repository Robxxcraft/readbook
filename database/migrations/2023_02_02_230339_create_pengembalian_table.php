<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->date('tanggal_dikembalikan');
            $table->bigInteger('denda');
            $table->integer('kuantitas');
            $table->unsignedBigInteger('anggota_id');
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('petugas_id');
            $table->timestamps();

            $table->foreign('anggota_id')->nullable()->on('anggota')->references('id')->onDelete('set null');
            $table->foreign('buku_id')->on('buku')->references('id')->onDelete('cascade');
            $table->foreign('petugas_id')->nullable()->on('petugas')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
};
