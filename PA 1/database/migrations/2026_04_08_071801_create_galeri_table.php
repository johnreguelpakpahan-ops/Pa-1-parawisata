<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('gambar');
            $table->enum('destinasi', ['balige', 'meat', 'batu_bahisan']);
            $table->foreignId('user_id')->default(1) ->constrained()->onDelete('cascade');
            $table->string('lokasi')->nullable();
            $table->date('tanggal_foto')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeri');
    }
};