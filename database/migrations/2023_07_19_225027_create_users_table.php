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
        Schema::create('user', function (Blueprint $table) {
            $table->string('idUser', 36)->primary();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->integer('dni')->unsigned()->length(8)->unique();
            $table->boolean('gender');
            $table->string('email', 100)->unique();
            $table->string('username', 100)->unique();
            $table->string('password', 50);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
