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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // name, slug, tagline, description, image, price, category_id, is_active <- all nullable
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('price')->nullable();
            $table->integer('category_id')->constrained('categories')->onDelete('cascade')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};