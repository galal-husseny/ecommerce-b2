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
        Schema::create('product_spec', function (Blueprint $table) {
            $table->foreignId('spec_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->string('value' , 256);
            $table->timestamps();
            $table->primary(['spec_id' , 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_spec');
    }
};
