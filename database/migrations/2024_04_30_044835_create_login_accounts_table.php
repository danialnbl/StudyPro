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
        Schema::create('LoginAccount', function (Blueprint $table) {
            $table->increments('LA_ID');
            $table->string('LA_Password');
            $table->string('LA_Username');
            $table->string('M_IC')->nullable(true);
            $table->string('P_IC')->nullable(true);
            $table->string('S_IC')->nullable(true);
            $table->foreign('M_IC')->references('M_IC')->on('Mentor')->onDelete('cascade');
            $table->foreign('P_IC')->references('P_IC')->on('Platinum')->onDelete('cascade');
            $table->foreign('S_IC')->references('S_IC')->on('Staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('LoginAccount');
    }
};

