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
        Schema::table('coupon_user', function (Blueprint $table) {
            $table->dropColumn('coupon_expired_at');
            $table->renameColumn('max_no_of_users_per_coupon','max_no_of_usage')->after('coupon_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_user', function (Blueprint $table) {
            $table->smallInteger('max_no_of_usage')->after('coupon_id')->change();
        });
    }
};
