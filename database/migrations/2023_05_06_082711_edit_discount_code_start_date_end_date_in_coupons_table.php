<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->smallInteger('discount')->after('max_usage_number_per_user')->change();
            $table->renameColumn('coed', 'code')->after('status')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->smallInteger('discount')->after('max_usage_number_per_user')->change();
            $table->renameColumn('code', 'coed')->after('status')->change();
        });
    }
};
