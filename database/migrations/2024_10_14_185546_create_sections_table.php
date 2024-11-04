<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('layout'); // Menentukan layout section, misalnya 'layout1', 'layout2'
            $table->json('content'); // Menyimpan konten secara fleksibel dalam format JSON
            $table->integer('order')->default(0); // Untuk mengurutkan sections
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }

};
