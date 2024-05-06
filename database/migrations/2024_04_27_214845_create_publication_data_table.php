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
            $table->string('PD_File');
            $table->date('PD_Date');
            $table->unsignedInteger('EP_ID');
            $table->foreign('EP_ID')->references('EP_ID')->on('ExpertPapers')->onDelete('cascade');
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
