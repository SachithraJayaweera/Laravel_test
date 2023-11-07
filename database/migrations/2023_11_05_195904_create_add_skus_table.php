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
        Schema::create('add_skus', function (Blueprint $table) {
            $table->id("skuid");
            $table->text("sku_code");
            $table->text("sku_name");
            $table->integer("mrp");
            $table->float("distributor_price");
            $table->float("weight_volume");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_skus');
    }
};
