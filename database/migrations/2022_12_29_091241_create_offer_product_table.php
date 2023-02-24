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
        Schema::create('offer_product', function (Blueprint $table) {
            $table->foreignId('offer_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->float('discount');
            $table->float('price_after_discount');
            $table->timestamps();
            $table->primary(['offer_id' , 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_product');
    }
};
