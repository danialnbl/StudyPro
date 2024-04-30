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
        Schema::create('DraftThesisPerformance', function (Blueprint $table) {
            $table->increments('DTP_ID');
            $table->integer('DTP_PrepDays');
            $table->integer('DTP_TotalPages');
            $table->unsignedInteger('DT_ID');
            $table->string('M_IC');
            $table->foreign('DT_ID')->references('DT_ID')->on('DraftThesis')->onDelete('cascade');
            $table->foreign('M_IC')->references('M_IC')->on('Mentor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DraftThesisPerformance');
    }
};
