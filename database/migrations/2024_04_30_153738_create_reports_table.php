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
        Schema::create('Report', function (Blueprint $table) {
            $table->increments('R_ID');
            $table->year('R_Year');
            $table->string('R_Desc');
            $table->string('S_IC');
            $table->string('P_IC');
            $table->foreign('S_IC')->references('S_IC')->on('Staff')->onDelete('cascade');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Report');
    }
};
