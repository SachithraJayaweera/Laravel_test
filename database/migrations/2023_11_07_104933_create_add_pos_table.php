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
        Schema::create('add_pos', function (Blueprint $table) {
            $table->id("po_no");
            $table->text("zone");
            $table->text("region");
            $table->text("po_territory");
            $table->text("distributor");
            $table->date("date");
            $table->text("remark");
            $table->decimal('totalSum', 10, 2)->default(0.00);
            $table->timestamps();
        });


        // Schema::create('add_pos_table', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('add_pos');
    }
};
