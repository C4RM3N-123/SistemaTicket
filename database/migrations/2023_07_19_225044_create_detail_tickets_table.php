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
        Schema::create('detailTicket', function (Blueprint $table) {
            $table->string('idDetail', 13)->primary();
            $table->boolean('state');
            $table->string('idTicket', 13);
            $table->string('idAdmin', 36);

            $table->foreign('idTicket')->references('idTicket')->on('ticket');
            $table->foreign('idAdmin')->references('idAdmin')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailTicket');
    }
};
