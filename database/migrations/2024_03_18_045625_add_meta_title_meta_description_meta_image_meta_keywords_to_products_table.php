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
        Schema::table('products', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->string('meta_title_in')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_description_in')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('meta_image_in')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_keywords_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_title_in');
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_description_in');
            $table->dropColumn('meta_image');
            $table->dropColumn('meta_image_in');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_keywords_in');
        });
    }
};
