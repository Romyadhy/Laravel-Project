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
        Schema::create('picupps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->unsignedBigInteger('id_maps');
            $table->string('no_telepon'); // Kolom nomor telepon baru
            $table->string('alamat'); // Kolom alamat baru
            $table->decimal('harga', 10, 3); // Kolom harga baru (contoh: decimal dengan 10 digit total, 3 digit di belakang koma)
            // Tambahkan foreign key ke tabel maps
            $table->foreign('id_maps')->references('id')->on('mapps')->onDelete('cascade');
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
        Schema::dropIfExists('picupps');
    }
};
