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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // user_id, dealer_id, status, total, payment_method, payment_status, shipping_address, shipping_method, shipping_status, shipping_details, billing_address, billing_method, billing_status, billing_details, is_active
            $table->integer('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->integer('dealer_id')->constrained('dealers')->onDelete('cascade')->nullable();
            $table->string('status')->nullable()->default('pending')->comment('pending, processing, shipping, completed, cancelled');
            $table->integer('total')->nullable();
            $table->string('payment_method')->nullable()->default('cod')->comment('cod, bank_transfer');
            $table->string('payment_status')->nullable()->default('unpaid')->comment('unpaid, paid');
            $table->string('shipping_name')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
