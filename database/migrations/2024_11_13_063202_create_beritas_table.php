<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id(); // ID kolom sebagai primary key
            $table->string('title'); // Kolom untuk judul berita
            $table->string('author'); // Kolom untuk penulis berita
            $table->text('description'); // Kolom untuk deskripsi berita
            $table->text('content'); // Kolom untuk konten berita
            $table->string('url'); // Kolom untuk URL berita
            $table->string('url_image')->nullable(); // Kolom untuk URL gambar (nullable)
            $table->timestamp('published_at')->nullable(); // Kolom untuk tanggal publikasi berita (nullable)
            $table->string('category'); // Kolom untuk kategori berita
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
}
