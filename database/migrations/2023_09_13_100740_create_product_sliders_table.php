<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_sliders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("product_id")->unique();
            $table->foreign("product_id")->references("id")->on("products")->cascadeOnUpdate()->restrictOnDelete();

            $table->string("title");
            $table->string("short_des");
            $table->string("price");
            $table->string("image",200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sliders');
    }
};
