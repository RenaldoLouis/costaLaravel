<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('billings', function (Blueprint $table) {
            $table->string('province_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('village_code')->nullable();
        });
    }

    public function down()
    {
        Schema::table('billings', function (Blueprint $table) {
            $table->dropColumn(['province_code', 'city_code', 'district_code', 'village_code']);
        });
    }

};
