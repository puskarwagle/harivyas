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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name'); // 'Amit' or 'Puskar'
            $table->enum('type', ['message', 'code']);
            $table->text('content'); // message or code
            $table->string('title')->nullable(); // used for code blocks
            $table->foreignId('reply_to_id')->nullable()->constrained('entries')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
