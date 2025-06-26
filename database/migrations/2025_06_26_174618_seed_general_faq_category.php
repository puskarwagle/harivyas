<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\FaqCategory;

return new class extends Migration
{
    public function up(): void
    {
        $category = FaqCategory::create(['id' => 1]);
        $category->setTranslation('name', 'General', 'en');
        $category->setTranslation('name', 'सामान्य', 'hi'); // Hindi
        $category->setTranslation('name', 'জেনারেল', 'bn'); // Bengali
    }

    public function down(): void
    {
        FaqCategory::where('id', 1)->delete();
    }
};