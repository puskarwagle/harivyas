<?php

use App\Models\Quote;

test('quote can be created with translations', function () {
    $quote = Quote::create([
        'display_date' => now()->toDateString(),
        'is_active' => true
    ]);

    $quote->setTranslations([
        'quote' => [
            'en' => 'The only way to do great work is to love what you do.',
            'ne' => 'महान काम गर्ने एकमात्र तरिका भनेको तपाईंले गर्ने कामलाई माया गर्नु हो।'
        ],
        'author' => [
            'en' => 'Steve Jobs',
            'ne' => 'स्टिभ जब्स'
        ]
    ]);

    expect($quote->translate('quote', 'en'))->toBe('The only way to do great work is to love what you do.');
    expect($quote->translate('quote', 'ne'))->toBe('महान काम गर्ने एकमात्र तरिका भनेको तपाईंले गर्ने कामलाई माया गर्नु हो।');
    expect($quote->translate('author', 'en'))->toBe('Steve Jobs');
    expect($quote->translate('author', 'ne'))->toBe('स्टिभ जब्स');
});

test('quote scopes work correctly', function () {
    $activeQuote = Quote::factory()->active()->create();
    $inactiveQuote = Quote::factory()->inactive()->create();
    $todayQuote = Quote::factory()->forToday()->create();

    expect(Quote::active()->count())->toBeGreaterThanOrEqual(2);
    expect(Quote::forDate(now()->toDateString())->count())->toBeGreaterThanOrEqual(1);
});

test('quote display component shows correct translation', function () {
    $quote = Quote::create([
        'display_date' => now()->toDateString(),
        'is_active' => true
    ]);

    $quote->setTranslations([
        'quote' => [
            'en' => 'Test quote in English',
            'ne' => 'नेपालीमा परीक्षण उद्धरण'
        ],
        'author' => [
            'en' => 'Test Author',
            'ne' => 'परीक्षण लेखक'
        ]
    ]);

    app()->setLocale('en');
    expect($quote->translate('quote'))->toBe('Test quote in English');
    
    app()->setLocale('ne');
    expect($quote->translate('quote'))->toBe('नेपालीमा परीक्षण उद्धरण');
});