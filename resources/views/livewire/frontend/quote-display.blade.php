<div>
    {{-- Temporary debug info - remove after fixing --}}
    @if(config('app.debug'))
    <div class="bg-yellow-100 p-4 mb-4 rounded border">
        <h3 class="font-bold">Debug Info:</h3>
        <pre>{{ print_r($debug, true) }}</pre>
        <p><strong>Quote found:</strong> {{ $todaysQuote ? 'Yes (ID: '.$todaysQuote->id.')' : 'No' }}</p>
        @if($todaysQuote)
            <p><strong>Translations loaded:</strong> {{ $todaysQuote->translations->count() }}</p>
            <p><strong>Quote text:</strong> {{ $todaysQuote->translate('quote') ?: 'No translation found' }}</p>
            <p><strong>Author:</strong> {{ $todaysQuote->translate('author') ?: 'No translation found' }}</p>
        @endif
    </div>
    @endif

    @if($todaysQuote)
    <div class="card shadow-xl">
        <div class="card-body bg-base-100">
            <div class="text-6xl text-primary/60 mb-4">"</div>
            <blockquote class="text-xl text-base-content italic mb-6 leading-relaxed">
                {{ $todaysQuote->translate('quote') }}
            </blockquote>
            <div class="text-right space-y-1">
                <cite class="block text-primary font-semibold">
                    - {{ $todaysQuote->translate('author') }}
                </cite>
            </div>
        </div>
    </div>
    @else
    <div class="bg-red-100 p-4 rounded border">
        <p>No quote found for today. Check debug info above.</p>
    </div>
    @endif
</div>