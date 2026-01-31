<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->uuid('public_id')->unique();
            $table->json('data');
            $table->json('metadata')->nullable();
            $table->integer('completion_time')->nullable();
            $table->enum('status', ['completed', 'partial'])->default('completed');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('form_submissions'); }
};
