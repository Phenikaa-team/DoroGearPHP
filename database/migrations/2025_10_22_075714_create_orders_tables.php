<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');

            $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->nullOnDelete();

            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number', 20);
            $table->text('address');

            $table->decimal('total_amount', 12, 2);
            $table->string('payment_method')->default('cod'); // cod = Cash on Delivery
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');

            $table->foreignId('order_id')->constrained('orders', 'order_id')->onDelete('cascade');

            $table->foreignId('product_id')->nullable()->constrained('products', 'product_id')->nullOnDelete();

            $table->integer('quantity');
            $table->decimal('price', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
