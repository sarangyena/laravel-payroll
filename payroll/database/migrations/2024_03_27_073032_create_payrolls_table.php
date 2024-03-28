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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('employees');
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('rate')->nullable();
            $table->string('days')->nullable();
            $table->string('late')->nullable();
            $table->string('salary')->nullable();
            $table->string('rph')->nullable();
            $table->string('hrs')->nullable();
            $table->string('otpay')->nullable();
            $table->string('holiday')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('advance')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
