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
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('role')->nullable();;
            $table->string('last')->nullable();;
            $table->string('first')->nullable();;
            $table->string('middle')->nullable();
            $table->string('status')->nullable();;
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('job')->nullable();;
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('rate')->nullable();;
            $table->string('address')->nullable();;
            $table->string('eName')->nullable();
            $table->string('ePhone')->nullable();
            $table->string('eAdd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
