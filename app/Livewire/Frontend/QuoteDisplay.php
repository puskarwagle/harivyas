<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Quote;

class QuoteDisplay extends Component
{
    public function render()
    {
        $todaysQuote = Quote::where('display_date', today())
            ->where('is_active', true)
            ->first();

        // Fallback to latest active quote if none for today
        if (!$todaysQuote) {
            $todaysQuote = Quote::where('is_active', true)
                ->orderBy('display_date', 'desc')
                ->first();
        }

        return view('livewire.frontend.quote-display', [
            'todaysQuote' => $todaysQuote
        ]);
    }
}