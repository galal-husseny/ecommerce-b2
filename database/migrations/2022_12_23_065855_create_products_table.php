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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name',512);
            $table->decimal('sale_price',10,2);
            $table->decimal('purchase_price',10,2);
            $table->smallInteger('quantity');
            $table->string('code');
            $table->json('description');
            $table->boolean('status')->comment('1 => active , 0 => not active')->default(1);
            $table->foreignId('category_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('products');
    }
};
