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
        Schema::create('Mentor', function (Blueprint $table) {
            $table->string('M_IC')->primary();          
            $table->string('M_Name');
            $table->string('M_Email');
            $table->string('M_PhoneNumber');
            $table->integer('M_MentorID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mentor');
    }
};
