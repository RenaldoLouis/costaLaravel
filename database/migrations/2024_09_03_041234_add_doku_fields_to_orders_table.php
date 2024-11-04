<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDokuFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->default('')->change(); // Mengubah default jika diperlukan
            $table->json('doku_request_json')->nullable(); // Menyimpan request JSON dari DOKU
            $table->timestamp('paid_at')->nullable(); // Menyimpan waktu pembayaran
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['doku_request_json', 'paid_at']);
        });
    }
}
