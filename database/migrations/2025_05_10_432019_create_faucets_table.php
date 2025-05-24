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
        Schema::create('faucets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blockchain_id')->constrained()->onDelete('cascade');
            $table->foreignId('token_id')->constrained()->onDelete('cascade');
            $table->string('url')->nullable(); // 每次领取多少
            $table->decimal('amount', 36, 18); // 每次领取多少
            $table->decimal('available_amount', 36, 18)->default(0); // 可领取余额
            $table->unsignedInteger('max_claims_per_wallet')->default(0);
            $table->unsignedInteger('cooldown_seconds')->default(3600); // 1小时冷却
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faucets');
    }
};