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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('title_in')->after('title')->nullable();
            $table->string('subtitle_in')->after('subtitle')->nullable();
            $table->text('description_in')->after('description')->nullable();
            $table->string('image_in')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn('title_in');
            $table->dropColumn('subtitle_in');
            $table->dropColumn('description_in');
            $table->dropColumn('image_in');
        });
    }
};
