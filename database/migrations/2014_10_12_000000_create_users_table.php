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
            $table->string('code', 20)->comment('employee code or ID')->nullable();
            $table->string('name', 50)->index();
            $table->string('mobile', 20)->unique()->nullable();
            $table->string('email', 50)->unique()->comment('dialer email');
            $table->string('password', 255);
            $table->enum('gender', ['1', '2', '3'])->comment('1=male, 2=female, 3=others')->default(3);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_deletable')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
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
