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
        Schema::create('components', function (Blueprint $table) {
            $table->id();

            $table->foreignId('page_id')->constrained()->onDelete('cascade');
            $table->foreignId('component_template_id')->nullable()->constrained('component_templates')->nullOnDelete();

            $table->string('name'); // user-friendly label
            $table->longText('html'); // user-modified HTML
            $table->json('data')->nullable(); // custom edits
            $table->integer('order')->default(0);
            $table->boolean('is_default')->default(false); // can't be deleted

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
