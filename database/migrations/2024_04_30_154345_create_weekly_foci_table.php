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
        Schema::create('WeeklyFocus', function (Blueprint $table) {
            $table->increments('WF_ID');
            $table->date('WF_Date');
            $table->string('WF_FocusBlock');
            $table->string('WF_FocusInfo');
            $table->string('WF_AdminInfo');
            $table->string('WF_SocialInfo');
            $table->string('WF_RecoveryInfo');
            $table->string('WF_Feedback');
            $table->string('M_IC');
            $table->string('P_IC');
            $table->foreign('M_IC')->references('M_IC')->on('Mentor')->onDelete('cascade');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('WeeklyFocus');
    }
};
