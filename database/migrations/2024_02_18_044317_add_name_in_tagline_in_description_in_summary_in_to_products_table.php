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
            $table->string('name_in')->after('name')->nullable();
            $table->string('tagline_in')->after('tagline')->nullable();
            $table->text('description_in')->after('description')->nullable();
            $table->text('summary_in')->after('summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name_in');
            $table->dropColumn('tagline_in');
            $table->dropColumn('description_in');
            $table->dropColumn('summary_in');
        });
    }
};
