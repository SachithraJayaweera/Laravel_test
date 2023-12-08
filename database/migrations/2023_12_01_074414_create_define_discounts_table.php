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
        Schema::create('define_discounts', function (Blueprint $table) {
            $table->id();
            $table->text("label");
            $table->text("product_code");
            $table->Text("pu_product");
            $table->Text("product_price");
            $table->integer("pu_quantity");
            $table->integer("discount");
            $table->float("weight_volume");
            $table->decimal('ratio', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('define_discounts');
    }
};
