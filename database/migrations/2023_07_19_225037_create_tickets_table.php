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
        Schema::create('ticket', function (Blueprint $table) {
            $table->string('idTicket', 13)->primary();
            $table->string('name', 100);
            $table->text('description');
            $table->string('prioritie', 50);
            $table->string('type', 50);
            $table->datetime('created_at');
            $table->datetime('ending_at');
            $table->string('idEmployee', 36);
            $table->string('idUser', 36);

            $table->foreign('idEmployee')->references('idEmployee')->on('employee');
            $table->foreign('idUser')->references('idUser')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};