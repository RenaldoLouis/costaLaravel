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
        Schema::table('pages', function (Blueprint $table) {
            $table->string('title_in')->after('title')->nullable();
            $table->text('excerpt_in')->after('excerpt')->nullable();
            $table->text('content_in')->after('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('title_in');
            $table->dropColumn('excerpt_in');
            $table->dropColumn('content_in');
        });
    }
};
