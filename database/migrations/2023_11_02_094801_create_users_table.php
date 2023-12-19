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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password')->hash();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('nationality')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('status', ['isActive', 'notActive'])->default('isActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};