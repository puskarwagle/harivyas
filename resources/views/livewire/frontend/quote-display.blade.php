<div>
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
    @endif
</div>
