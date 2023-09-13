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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnUpdate()->restrictOnDelete();

            $table->string("total");
            $table->string("vat");
            $table->string("payable");
            $table->string("cus_details");
            $table->string("ship_details");
            $table->string("tran_id");
            $table->string("val_id");
            $table->enum("status",["pending","processing","completed"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
