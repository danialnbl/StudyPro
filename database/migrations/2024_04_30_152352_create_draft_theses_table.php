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
        Schema::create('DraftThesis', function (Blueprint $table) {
            $table->increments('DT_ID');
            $table->string('DT_Title');
            $table->integer('DT_DraftNumber');
            $table->date('DT_StartDate');
            $table->date('DT_EndDate');
            $table->string('DT_draftFile');
            $table->integer('DT_PagesNumber');
            $table->string('DT_Feedback');
            $table->integer('DT_DDC');
            $table->string('P_IC');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_theses');
    }
};
