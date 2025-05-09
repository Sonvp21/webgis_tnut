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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // ID chính
            $table->string('title'); // Tiêu đề liên hệ
            $table->string('full_name'); // Tên người liên hệ
            $table->string('phone')->nullable(); // Số điện thoại
            $table->string('email')->nullable(); // Email
            $table->text('content'); // Nội dung liên hệ
            $table->tinyInteger('status')->default(0); // Trạng thái (0 = chưa xử lý, 1 = đã xử lý)
            
            $table->timestamp('read_at')->nullable(); // Thời gian đọc
            $table->softDeletes(); // Hỗ trợ xóa mềm
            $table->timestamps(); // created_at & updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
