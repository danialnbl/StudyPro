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
        Schema::create('draftthesis', function (Blueprint $table) {
            $table->increments('DT_ID');
            $table->string('DT_Title');
            $table->integer('DT_DraftNumber');
            $table->date('DT_StartDate');
            $table->date('DT_EndDate');
            $table->integer('DT_PagesNumber');
            $table->string('DT_Feedback');
            $table->string('DT_TotalPages');
            $table->string('DT_PrepDays');
            $table->integer('DT_DDC');
            $table->string('P_IC')->nullable();
            $table->string('M_IC')->nullable();
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
            $table->foreign('M_IC')->references('M_IC')->on('Mentor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draftthesis');
    }
};
