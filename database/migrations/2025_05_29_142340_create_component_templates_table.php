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
        Schema::create('component_templates', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'button', 'card'
            $table->string('name'); // 'Primary CTA Button'
            $table->longText('html'); // Full DaisyUI snippet
            $table->json('default_data')->nullable(); // editable fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_templates');
    }
};
