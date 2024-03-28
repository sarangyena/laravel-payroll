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
            $table->string('role');
            $table->string('userId')->unique();
            $table->string('last');
            $table->string('first');
            $table->string('middle')->nullable();
            $table->string('status');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('job');
            $table->string('sss')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('rate');
            $table->string('address');
            $table->string('eName')->nullable();
            $table->string('ePhone')->nullable();
            $table->string('eAdd')->nullable();
            $table->string('created_by');
            $table->string('image');
            $table->timestamps();
        });
        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');        
        Schema::dropIfExists('employees');
    }
};
