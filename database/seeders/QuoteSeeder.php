<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        $quotes = [
            [
                'quote' => [
                    'en' => 'The only way to do great work is to love what you do.',
                    'ne' => 'महान काम गर्ने एकमात्र तरिका भनेको तपाईंले गर्ने कामलाई माया गर्नु हो।'
                ],
                'author' => [
                    'en' => 'Steve Jobs',
                    'ne' => 'स्टिभ जब्स'
                ],
                'display_date' => now()->toDateString(),
                'is_active' => true
            ],
            [
                'quote' => [
                    'en' => 'Life is what happens to you while you\'re busy making other plans.',
                    'ne' => 'जीवन भनेको तपाईं अन्य योजनाहरू बनाउन व्यस्त हुँदा तपाईंलाई के हुन्छ।'
                ],
                'author' => [
                    'en' => 'John Lennon',
                    'ne' => 'जोन लेनन'
                ],
                'display_date' => now()->addDay()->toDateString(),
                'is_active' => true
            ],
            [
                'quote' => [
                    'en' => 'The future belongs to those who believe in the beauty of their dreams.',
                    'ne' => 'भविष्य तिनीहरूको हो जसले आफ्ना सपनाहरूको सुन्दरतामा विश्वास गर्छन्।'
                ],
                'author' => [
                    'en' => 'Eleanor Roosevelt',
                    'ne' => 'एलेनोर रुजवेल्ट'
                ],
                'display_date' => now()->addDays(2)->toDateString(),
                'is_active' => true
            ]
        ];

        foreach ($quotes as $quoteData) {
            $quote = Quote::create([
                'display_date' => $quoteData['display_date'],
                'is_active' => $quoteData['is_active']
            ]);

            // Set translations
            $quote->setTranslations([
                'quote' => $quoteData['quote'],
                'author' => $quoteData['author']
            ]);
        }
    }
}