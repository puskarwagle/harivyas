<?php

namespace App\Console\Commands;

use App\Models\Quote;
use Illuminate\Console\Command;

class SeedQuotes extends Command
{
    protected $signature = 'quotes:seed {--count=5 : Number of quotes to create}';
    protected $description = 'Seed the database with sample quotes in multiple languages';

    public function handle()
    {
        $count = $this->option('count');
        
        $this->info("Creating {$count} sample quotes...");

        $sampleQuotes = [
            [
                'quote' => [
                    'en' => 'The only way to do great work is to love what you do.',
                    'ne' => 'महान काम गर्ने एकमात्र तरिका भनेको तपाईंले गर्ने कामलाई माया गर्नु हो।'
                ],
                'author' => [
                    'en' => 'Steve Jobs',
                    'ne' => 'स्टिभ जब्स'
                ]
            ],
            [
                'quote' => [
                    'en' => 'Life is what happens to you while you\'re busy making other plans.',
                    'ne' => 'जीवन भनेको तपाईं अन्य योजनाहरू बनाउन व्यस्त हुँदा तपाईंलाई के हुन्छ।'
                ],
                'author' => [
                    'en' => 'John Lennon',
                    'ne' => 'जोन लेनन'
                ]
            ],
            [
                'quote' => [
                    'en' => 'The future belongs to those who believe in the beauty of their dreams.',
                    'ne' => 'भविष्य तिनीहरूको हो जसले आफ्ना सपनाहरूको सुन्दरतामा विश्वास गर्छन्।'
                ],
                'author' => [
                    'en' => 'Eleanor Roosevelt',
                    'ne' => 'एलेनोर रुजवेल्ट'
                ]
            ],
            [
                'quote' => [
                    'en' => 'Be yourself; everyone else is already taken.',
                    'ne' => 'आफै बन्नुहोस्; अरू सबै पहिले नै लिइसकेका छन्।'
                ],
                'author' => [
                    'en' => 'Oscar Wilde',
                    'ne' => 'ओस्कर वाइल्ड'
                ]
            ],
            [
                'quote' => [
                    'en' => 'In the middle of difficulty lies opportunity.',
                    'ne' => 'कठिनाईको बीचमा अवसर छ।'
                ],
                'author' => [
                    'en' => 'Albert Einstein',
                    'ne' => 'अल्बर्ट आइन्स्टाइन'
                ]
            ]
        ];

        for ($i = 0; $i < $count; $i++) {
            $quoteData = $sampleQuotes[$i % count($sampleQuotes)];
            
            $quote = Quote::create([
                'display_date' => now()->addDays($i)->toDateString(),
                'is_active' => true
            ]);

            $quote->setTranslations($quoteData);
            
            $this->line("Created quote: " . substr($quoteData['quote']['en'], 0, 50) . "...");
        }

        $this->success("Successfully created {$count} quotes!");
    }
}
