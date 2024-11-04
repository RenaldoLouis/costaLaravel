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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('content_box_title')->nullable();
            $table->text('content_box')->nullable()->after('content_box_title');
            $table->string('content_box_title_in')->nullable();
            $table->text('content_box_in')->nullable()->after('content_box_title_in');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('content_box_title');
            $table->dropColumn('content_box');
            $table->dropColumn('content_box_title_in');
            $table->dropColumn('content_box_in');
        });
    }
};
