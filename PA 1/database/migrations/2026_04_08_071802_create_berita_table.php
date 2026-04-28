<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('konten');
            $table->enum('kategori',['event','prestasi','infrastruktur','edukasi','promosi']);
            $table->string('gambar');
            $table->string('penulis');
            $table->foreignId('user_id')->default(1) ->constrained()->onDelete('cascade');
            $table->date('tanggal_terbit');
            $table->boolean('status')->default(true);
            $table->integer('views')->default(0);
            $table->integer('komentar')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita');
    }
};