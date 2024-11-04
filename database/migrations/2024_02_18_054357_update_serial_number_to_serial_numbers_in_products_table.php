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
        // Add the new column, copy the data, then drop the old column
        Schema::table('products', function (Blueprint $table) {
            $table->string('serial_numbers')->nullable(); // Create the new column
        });

        // Optionally copy the data from 'serial_number' to 'serial_numbers'
        DB::statement('UPDATE products SET serial_numbers = serial_number');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('serial_number'); // Drop the old column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add the old column back
        Schema::table('products', function (Blueprint $table) {
            $table->string('serial_number')->nullable();
        });

        // Optionally copy the data from 'serial_numbers' back to 'serial_number'
        DB::statement('UPDATE products SET serial_number = serial_numbers');

        // Drop the new column
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('serial_numbers');
        });
    }
};