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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->boolean('status')->comment('1 => active , 0 => not active')->default(1);
            $table->float('total_price');
            $table->float('final_price');
            $table->date('delivery_date' , $precision =0);
            $table->foreignId('address_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('coupon_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('orders');
    }
};
