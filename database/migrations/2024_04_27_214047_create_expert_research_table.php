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
        Schema::create('ExpertResearch', function (Blueprint $table) {
            $table->increments('ER_ID');
            $table->unsignedInteger('E_ID');
            $table->string('ER_Title');
            $table->foreign('E_ID')->references('E_ID')->on('Experts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpertResearch');
    }
};
