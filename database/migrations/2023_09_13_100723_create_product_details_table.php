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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("product_id")->unique();
            $table->foreign("product_id")->references("id")->on("products")->cascadeOnUpdate()->restrictOnDelete();

            $table->string("img1",200);
            $table->string("img2",200);
            $table->string("img3",200);
            $table->string("img4",200);
            $table->longText("description");
            $table->string("color");
            $table->string("size");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
