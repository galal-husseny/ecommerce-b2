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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('max_usage_number_per_user')->default(1);
            $table->smallInteger('discount');
            $table->integer('max_discount_value');
            $table->boolean('status')->comment('1 => active , 0 => not active')->default(1);
            $table->integer('code')->unique();
            $table->integer('max_usage_number');
            $table->integer('min_order_value');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
