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
        Schema::create('Staff', function (Blueprint $table) {
            $table->string('S_IC')->primary();
            $table->string('S_Name');
            $table->string('S_Email');
            $table->string('S_PhoneNumber');
            $table->integer('S_StaffID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Staff');
    }
};
