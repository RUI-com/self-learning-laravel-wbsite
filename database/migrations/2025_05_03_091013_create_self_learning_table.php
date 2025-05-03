<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('self_learning', function (Blueprint $table) {
            $table->id(); // مفتاح أساسي
            $table->unsignedBigInteger('user_id'); // رقم معرف المستخدم يلي نشر المحتوى
            $table->string('title'); // عنوان المنشور
            $table->text('description')->nullable(); // وصف المحتوى
            $table->string('media_url')->nullable(); // رابط صورة أو فيديو
            $table->timestamps(); // created_at و updated_at

            // مفتاح أجنبي بيربط المستخدمين
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('self_learning');
    }
};
