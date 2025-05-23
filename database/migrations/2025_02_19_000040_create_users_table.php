<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Bảng Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->index();
            $table->date('birthday')->nullable();
            $table->text('description')->nullable();
            $table->string('ip', 45)->nullable(); // Giới hạn IPv6
            $table->string('password');
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active')->index();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Bảng Password Reset Tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Bảng Sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
