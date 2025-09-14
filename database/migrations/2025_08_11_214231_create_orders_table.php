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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('person_name'); // اسم الشخص
            $table->string('address'); // العنوان
            $table->string('whatsapp_number');
            $table->string('number'); // رقم واتساب (اختياري)
            $table->decimal('item_amount', 8, 2); // مبلغ السلعة
            $table->string('order_type')->nullable();
            $table->string('order_name')->nullable(); //اسم السلعه
            $table->string('alternative_requested')->nullable(); // البديل المطلوب
            $table->string('alternative_item_title')->nullable(); // عنوان السلعة البديلة
            $table->text('item_specifications')->nullable(); // مواصفات السلعة
            $table->text('notes')->nullable(); // ملاحظات
            $table->json('cart_images')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_rejected')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
