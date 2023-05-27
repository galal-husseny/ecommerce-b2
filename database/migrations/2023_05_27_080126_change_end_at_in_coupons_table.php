<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `coupons` CHANGE `end_at` `end_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;');
        Schema::table('coupons', function (Blueprint $table) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `coupons` CHANGE `end_at` `end_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;');
        Schema::table('coupons', function (Blueprint $table) {
        });
    }
};
