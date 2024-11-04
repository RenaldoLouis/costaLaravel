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
        Schema::create('dealer_marketplaces', function (Blueprint $table) {
            $table->id();
            // dealer_id, marketplace_id, is_active
            $table->integer('dealer_id')->constrained('dealers')->onDelete('cascade')->nullable();
            $table->integer('marketplace_id')->constrained('marketplaces')->onDelete('cascade')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealer_marketplaces');
    }
};
