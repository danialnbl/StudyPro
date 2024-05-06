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
        Schema::create('ExpertPapers', function (Blueprint $table) {
            $table->increments('EP_ID');
            $table->unsignedInteger('E_ID');
            $table->unsignedInteger('ER_ID');
            $table->string('EP_Paper');
            $table->date('EP_Year');
            $table->foreign('E_ID')->references('E_ID')->on('Experts')->onDelete('cascade');
            $table->foreign('ER_ID')->references('ER_ID')->on('ExpertResearch')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpertPaper');
    }
};
