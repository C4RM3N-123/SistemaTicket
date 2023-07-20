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
        Schema::create('picture', function (Blueprint $table) {
            $table->string('idImage', 13)->primary();
            $table->binary('imageBefore', 'medium'); // Changed to 'medium'
            $table->binary('imageAfter', 'medium'); // Changed to 'medium'
            $table->string('idTicket', 13);

            $table->foreign('idTicket')->references('idTicket')->on('ticket');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picture');
    }
};
