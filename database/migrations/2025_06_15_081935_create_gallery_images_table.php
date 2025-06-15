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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('url'); // image path relative to /public/images/gallery
            $table->string('category')->nullable();
            $table->json('tags')->nullable(); // ['radha', 'krishna']
            $table->boolean('show_in_homepage')->default(false);
            $table->string('location')->nullable(); // e.g. 'Vrindavan', 'Mandir Hall'
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
