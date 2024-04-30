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
        Schema::create('PublicationReport', function (Blueprint $table) {
            $table->increments('PR_ID');
            $table->unsignedInteger('PD_ID');
            $table->string('PR_Name');
            $table->date('PR_Date');
            $table->string('PR_Description');
            $table->string('M_IC');
            $table->foreign('PD_ID')->references('PD_ID')->on('PublicationData')->onDelete('cascade');
            $table->foreign('M_IC')->references('M_IC')->on('Mentor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PublicationReport');
    }
};
