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
        Schema::create('add_users', function (Blueprint $table) {
            $table->longText("name");
            $table->id("nic");
            $table->longText("address");
            $table->Text("mobile");
            $table->Text("email");
            $table->Text("gender");
            $table->Text("territory");
            $table->Text("username");
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_users');
    }
};
