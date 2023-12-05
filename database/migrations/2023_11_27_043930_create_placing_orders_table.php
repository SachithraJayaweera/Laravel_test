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
        Schema::create('placing_orders', function (Blueprint $table) {
            $table->id();
            $table->integer("order_number")->nullable();
            $table->text("customer_name");         
            $table->text("product_name");
            $table->text("product_code");
            $table->float("price");
            $table->integer("quantity");
            $table->integer("free");
            $table->float("amount");
            $table->float("net_amount")->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('placing_orders');
    }
    
};
