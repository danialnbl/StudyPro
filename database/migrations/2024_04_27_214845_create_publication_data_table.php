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
        Schema::create('PublicationData', function (Blueprint $table) {
            $table->increments('PD_ID');
            $table->string('PD_Title');
            $table->string('PD_University');
            $table->string('PD_Type');
            $table->string('PD_Author');
            $table->string('PD_DOI');
            $table->string('PD_FileName');
            $table->string('PD_FilePath');
            $table->date('PD_Date');
            $table->unsignedInteger('E_ID')->nullable(true);
            $table->string('P_IC')->nullable(true);
            $table->foreign('E_ID')->references('E_ID')->on('Experts')->onDelete('cascade');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PublicationData');
    }
};
