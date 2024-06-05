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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // relation with account, category, and user
            $table->foreignId('user_id')->constrained();
            $table->foreignId('account_id')->constrained();
            $table->foreignId('category_id')->constrained();

            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['income', 'expense', 'saving']);
            $table->integer('amount');
            $table->date('date');

            $table->timestamps();

            // soft delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
