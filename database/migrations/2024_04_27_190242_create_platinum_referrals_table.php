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
        Schema::create('PlatinumReferral', function (Blueprint $table) {
            $table->increments('PR_Id');
            $table->string('PR_Name');
            $table->integer('PR_Batch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platinum_referrals');
        Schema::dropIfExists('PlatinumReferral');
    }
};
