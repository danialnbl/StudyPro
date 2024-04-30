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
        Schema::create('PlatinumEducation', function (Blueprint $table) {
            $table->increments('PE_Id');
            $table->string('PE_EduInstitute');
            $table->string('PE_Sponsorship');
            $table->decimal('PE_ProgramFee');
            $table->string('PE_EduLevel');
            $table->string('PE_Occupation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PlatinumEducation');
    }
};
