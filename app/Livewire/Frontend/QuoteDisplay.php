<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Quote;

class QuoteDisplay extends Component
{
    public function render()
    {
        // Debug information
        $debug = [
            'today' => today()->toDateString(),
            'locale' => app()->getLocale(),
            'total_quotes' => Quote::count(),
            'active_quotes' => Quote::where('is_active', true)->count(),
            'quotes_for_today' => Quote::where('display_date', today())->count(),
        ];

        $todaysQuote = Quote::with('translations')
            ->where('display_date', today())
            ->where('is_active', true)
            ->first();

        // Fallback to latest active quote if none for today
        if (!$todaysQuote) {
            $todaysQuote = Quote::with('translations')
                ->where('is_active', true)
                ->orderBy('display_date', 'desc')
                ->first();
        }

        // Log debug info in development
        if (config('app.debug')) {
            \Log::info('QuoteDisplay Debug', [
                'debug' => $debug,
                'todaysQuote' => $todaysQuote ? $todaysQuote->id : null,
                'translations_count' => $todaysQuote ? $todaysQuote->translations->count() : 0
            ]);
        }

        return view('livewire.frontend.quote-display', [
            'todaysQuote' => $todaysQuote,
            'debug' => $debug
        ]);
    }
}