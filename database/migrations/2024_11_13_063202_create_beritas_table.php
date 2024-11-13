<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id(); 
            $table->string('title');
            $table->string('author'); 
            $table->text('description'); 
            $table->text('content'); 
            $table->string('url'); 
            $table->string('url_image')->nullable(); 
            $table->timestamp('published_at')->nullable(); 
            $table->string('category'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }

};
