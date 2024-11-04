<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            // Menambahkan kolom 'showcase_id' sebelum kolom 'layout'
            $table->unsignedBigInteger('showcase_id')->after('id')->nullable();

            // Menambahkan foreign key constraint
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            // Menghapus foreign key dan kolom 'showcase_id'
            $table->dropForeign(['showcase_id']);
            $table->dropColumn('showcase_id');
        });
    }
};
