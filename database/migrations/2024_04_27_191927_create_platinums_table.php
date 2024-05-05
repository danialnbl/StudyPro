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
        Schema::create('Platinum', function (Blueprint $table) {
            $table->string('P_IC')->primary();
            $table->string('P_Name');
            $table->string('P_Gender');
            $table->string('P_Religion');
            $table->string('P_Race');
            $table->string('P_Citizenship');
            $table->string('P_Address');
            $table->string('P_City');
            $table->string('P_State');
            $table->string('P_Country');
            $table->string('P_Zip');
            $table->string('P_PhoneNumber');
            $table->string('P_Email');
            $table->string('P_Facebook');
            $table->string('P_TshirtSize');
            $table->date('P_DateApply');
            $table->string('P_Program');
            $table->integer('P_Batch');
            $table->string('P_Status');
            $table->string('P_Title');
            $table->unsignedInteger('PE_Id');
            $table->unsignedInteger('PR_Id')->nullable(true);
            $table->foreign('PE_Id')->references('PE_Id')->on('platinumeducation')->onDelete('cascade');
            $table->foreign('PR_Id')->references('PR_Id')->on('PlatinumReferral')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Platinum');
    }
};
