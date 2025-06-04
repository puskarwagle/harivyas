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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('pages')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->boolean('is_default')->default(false);
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_published')->default(true);
            $table->boolean('show_in_nav')->default(true);
            $table->integer('nav_order')->default(0);
            $table->enum('type', ['static', 'dynamic'])->default('static');
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
