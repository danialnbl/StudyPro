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
        Schema::create('Expert', function (Blueprint $table) {
            $table->increments('E_ID');
            $table->string('E_Name');
            $table->string('E_University');
            $table->string('E_Email');
            $table->string('E_PhoneNumber');
            $table->string('P_IC');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Expert');
    }
};
