<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\FaqTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChaosTestSeeder extends Seeder
{
    private $locales = ['en', 'hi', 'ne', 'fr', 'es'];
    private $categories = [];
    private $tags = [];
    
    public function run(): void
    {
        $this->command->info('🔥 Starting Chaos Test Seeder...');
        
        // Clear existing data
        $this->command->info('🧹 Clearing existing data...');
        DB::table('faq_tag_pivot')->delete();
        DB::table('translations')->delete();
        Faq::query()->delete();
        FaqTag::query()->delete();
        FaqCategory::query()->delete();
        
        $startTime = microtime(true);
        $initialMemory = memory_get_usage(true);
        
        // Phase 1: Create categories with translations
        $this->createCategoriesWithTranslations();
        
        // Phase 2: Create tags with translations
        $this->createTagsWithTranslations();
        
        // Phase 3: Create FAQs with translations and relationships
        $this->createFaqsWithTranslations();
        
        // Phase 4: Performance tests
        $this->runPerformanceTests();
        
        // Phase 5: Serialization tests
        $this->runSerializationTests();
        
        // Phase 6: Concurrent write simulation
        $this->runConcurrentWriteTests();
        
        $endTime = microtime(true);
        $finalMemory = memory_get_usage(true);
        
        $this->command->info("⏱️  Total time: " . round($endTime - $startTime, 2) . " seconds");
        $this->command->info("💾 Memory used: " . $this->formatBytes($finalMemory - $initialMemory));
        $this->command->info("✅ Chaos test completed successfully!");
    }
    
    private function createCategoriesWithTranslations(): void
    {
        $this->command->info('📁 Creating categories with translations...');
        
        $categoryData = [
            'general' => [
                'en' => 'General Questions',
                'hi' => 'सामान्य प्रश्न',
                'ne' => 'सामान्य प्रश्नहरू',
                'fr' => 'Questions Générales',
                'es' => 'Preguntas Generales'
            ],
            'technical' => [
                'en' => 'Technical Support',
                'hi' => 'तकनीकी सहायता',
                'ne' => 'प्राविधिक सहायता',
                'fr' => 'Support Technique',
                'es' => 'Soporte Técnico'
            ],
            'spiritual' => [
                'en' => 'Spiritual Guidance',
                'hi' => 'आध्यात्मिक मार्गदर्शन',
                'ne' => 'आध्यात्मिक मार्गदर्शन',
                'fr' => 'Guidance Spirituelle',
                'es' => 'Guía Espiritual'
            ]
        ];
        
        foreach ($categoryData as $slug => $translations) {
            $category = FaqCategory::create([
                'slug' => $slug,
                'sort_order' => count($this->categories),
                'is_active' => true
            ]);
            
            $category->setTranslations(['name' => $translations]);
            $this->categories[] = $category;
        }
        
        $this->command->info("✅ Created " . count($this->categories) . " categories");
    }
    
    private function createTagsWithTranslations(): void
    {
        $this->command->info('🏷️  Creating tags with translations...');
        
        $tagData = [
            'beginner' => [
                'en' => 'Beginner',
                'hi' => 'शुरुआती',
                'ne' => 'सुरुवाती',
                'fr' => 'Débutant',
                'es' => 'Principiante'
            ],
            'advanced' => [
                'en' => 'Advanced',
                'hi' => 'उन्नत',
                'ne' => 'उन्नत',
                'fr' => 'Avancé',
                'es' => 'Avanzado'
            ],
            'urgent' => [
                'en' => 'Urgent',
                'hi' => 'तत्काल',
                'ne' => 'तत्काल',
                'fr' => 'Urgent',
                'es' => 'Urgente'
            ],
            'meditation' => [
                'en' => 'Meditation',
                'hi' => 'ध्यान',
                'ne' => 'ध्यान',
                'fr' => 'Méditation',
                'es' => 'Meditación'
            ],
            'temple' => [
                'en' => 'Temple',
                'hi' => 'मंदिर',
                'ne' => 'मन्दिर',
                'fr' => 'Temple',
                'es' => 'Templo'
            ]
        ];
        
        foreach ($tagData as $slug => $translations) {
            $tag = FaqTag::create(['slug' => $slug]);
            $tag->setTranslations(['name' => $translations]);
            $this->tags[] = $tag;
        }
        
        $this->command->info("✅ Created " . count($this->tags) . " tags");
    }
    
    private function createFaqsWithTranslations(): void
    {
        $this->command->info('❓ Creating FAQs with translations...');
        
        $faqTemplates = [
            [
                'slug' => 'what-is-meditation',
                'questions' => [
                    'en' => 'What is meditation and how do I start?',
                    'hi' => 'ध्यान क्या है और मैं कैसे शुरू करूं?',
                    'ne' => 'ध्यान के हो र म कसरी सुरु गर्ने?',
                    'fr' => 'Qu\'est-ce que la méditation et comment commencer?',
                    'es' => '¿Qué es la meditación y cómo empiezo?'
                ],
                'answers' => [
                    'en' => 'Meditation is a practice of focused attention and mindfulness. Start with 5 minutes daily, focusing on your breath.',
                    'hi' => 'ध्यान एक केंद्रित ध्यान और सचेतता का अभ्यास है। प्रतिदिन 5 मिनट से शुरू करें, अपनी सांस पर ध्यान दें।',
                    'ne' => 'ध्यान एक केन्द्रित ध्यान र सचेतनाको अभ्यास हो। दैनिक ५ मिनेटदेखि सुरु गर्नुहोस्।',
                    'fr' => 'La méditation est une pratique d\'attention concentrée. Commencez par 5 minutes par jour.',
                    'es' => 'La meditación es una práctica de atención enfocada. Comienza con 5 minutos diarios.'
                ]
            ],
            [
                'slug' => 'temple-timings',
                'questions' => [
                    'en' => 'What are the temple opening hours?',
                    'hi' => 'मंदिर खुलने का समय क्या है?',
                    'ne' => 'मन्दिर खुल्ने समय के हो?',
                    'fr' => 'Quelles sont les heures d\'ouverture du temple?',
                    'es' => '¿Cuáles son los horarios de apertura del templo?'
                ],
                'answers' => [
                    'en' => 'The temple is open from 5:00 AM to 9:00 PM daily. Special ceremonies may extend hours.',
                    'hi' => 'मंदिर प्रतिदिन सुबह 5:00 बजे से रात 9:00 बजे तक खुला रहता है।',
                    'ne' => 'मन्दिर दैनिक बिहान ५:०० देखि बेलुका ९:०० बजे सम्म खुला हुन्छ।',
                    'fr' => 'Le temple est ouvert de 5h00 à 21h00 tous les jours.',
                    'es' => 'El templo está abierto de 5:00 AM a 9:00 PM todos los días.'
                ]
            ]
        ];
        
        // Create base FAQs
        foreach ($faqTemplates as $template) {
            $faq = Faq::create([
                'slug' => $template['slug'],
                'category_id' => $this->categories[array_rand($this->categories)]->id,
                'is_active' => true,
                'sort_order' => 0
            ]);
            
            $faq->setTranslations([
                'question' => $template['questions'],
                'answer' => $template['answers']
            ]);
            
            // Attach random tags
            $randomTags = collect($this->tags)->random(rand(1, 3));
            $faq->tags()->attach($randomTags->pluck('id'));
        }
        
        // Create additional FAQs for stress testing
        $this->command->info('🔥 Creating stress test FAQs...');
        
        for ($i = 0; $i < 1000; $i++) {
            $faq = Faq::create([
                'slug' => 'stress-test-' . $i,
                'category_id' => $this->categories[array_rand($this->categories)]->id,
                'is_active' => rand(0, 1),
                'sort_order' => $i
            ]);
            
            // Create translations for random subset of locales
            $translations = [];
            foreach (collect($this->locales)->random(rand(2, 4)) as $locale) {
                $translations['question'][$locale] = "Stress test question #{$i} in {$locale}";
                $translations['answer'][$locale] = "This is a stress test answer #{$i} in {$locale} locale. " . Str::random(200);
            }
            
            $faq->setTranslations($translations);
            
            // Attach random tags
            if (rand(0, 1)) {
                $randomTags = collect($this->tags)->random(rand(1, 2));
                $faq->tags()->attach($randomTags->pluck('id'));
            }
            
            if ($i % 100 === 0) {
                $this->command->info("Created {$i} stress test FAQs...");
            }
        }
        
        $this->command->info("✅ Created 1002 total FAQs");
    }
    
    private function runPerformanceTests(): void
    {
        $this->command->info('🚀 Running performance tests...');
        
        // Test 1: Query without eager loading
        $start = microtime(true);
        $faqs = Faq::limit(50)->get();
        foreach ($faqs as $faq) {
            $faq->translate('question', 'hi'); // This should hit DB each time
        }
        $timeWithoutEager = microtime(true) - $start;
        
        // Test 2: Query with eager loading
        $start = microtime(true);
        $faqs = Faq::withTranslations('hi')->limit(50)->get();
        foreach ($faqs as $faq) {
            $faq->translate('question', 'hi'); // This should use cached data
        }
        $timeWithEager = microtime(true) - $start;
        
        $this->command->info("⏱️  Without eager loading: " . round($timeWithoutEager, 4) . "s");
        $this->command->info("⏱️  With eager loading: " . round($timeWithEager, 4) . "s");
        $this->command->info("📈 Performance improvement: " . round(($timeWithoutEager / $timeWithEager), 2) . "x faster");
        
        // Test 3: Memory usage with caching
        $initialMemory = memory_get_usage();
        $faq = Faq::withTranslations()->first();
        
        // Access same translation multiple times
        for ($i = 0; $i < 100; $i++) {
            $faq->translate('question', 'en');
            $faq->translate('answer', 'hi');
        }
        
        $memoryAfterCache = memory_get_usage();
        $this->command->info("💾 Memory used by caching: " . $this->formatBytes($memoryAfterCache - $initialMemory));
    }
    
    private function runSerializationTests(): void
    {
        $this->command->info('📦 Running serialization tests...');
        
        $faq = Faq::withTranslations()->first();
        
        // Load some translations into cache
        $faq->translate('question', 'en');
        $faq->translate('answer', 'hi');
        
        try {
            // Test serialization
            $serialized = serialize($faq);
            $unserialized = unserialize($serialized);
            
            // Test that translations still work after unserialization
            $question = $unserialized->translate('question', 'en');
            
            if ($question) {
                $this->command->info("✅ Serialization test passed");
            } else {
                $this->command->error("❌ Serialization test failed - no translation found");
            }
            
        } catch (\Exception $e) {
            $this->command->error("❌ Serialization test failed: " . $e->getMessage());
        }
    }
    
    private function runConcurrentWriteTests(): void
    {
        $this->command->info('🔄 Running concurrent write simulation...');
        
        $faq = Faq::first();
        
        // Simulate concurrent writes to same translation
        $processes = [];
        for ($i = 0; $i < 5; $i++) {
            $processes[] = function() use ($faq, $i) {
                try {
                    $faq->setTranslation('question', "Concurrent update #{$i}", 'test');
                    return "Process {$i} succeeded";
                } catch (\Exception $e) {
                    return "Process {$i} failed: " . $e->getMessage();
                }
            };
        }
        
        // Execute "concurrent" processes
        foreach ($processes as $i => $process) {
            $result = $process();
            $this->command->info("Process {$i}: " . $result);
        }
        
        // Check final state
        $finalTranslation = $faq->fresh()->translate('question', 'test');
        $this->command->info("Final translation: " . $finalTranslation);
    }
    
    private function formatBytes($bytes, $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
}