<!DOCTYPE html>
<html data-theme="luxury">
    <head>
        @include('partials.kaid')
    </head>
    <body class="caret-secondary min-h-screen">
        <livewire:frontend.header />

        <main>
            {{ $slot }}
        </main>

        <livewire:frontend.footer />

        @if (Route::has('login'))
        <div></div>
        @endif

        @livewireScripts
    </body>
</html>
