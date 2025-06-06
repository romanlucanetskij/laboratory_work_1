<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('product')->nullable();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('courier_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['нове', 'призначено', 'виконано'])->default('нове');
            $table->timestamp('start_date')->useCurrent();

            $table->timestamps(); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
