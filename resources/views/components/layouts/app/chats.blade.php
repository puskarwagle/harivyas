<!DOCTYPE html>
<html data-theme="luxury">
    <head>
        @include('partials.kaid')
    </head>
    <body class="caret-secondary min-h-screen">
        <main>
            {{ $slot }}
        </main>

        @if (Route::has('login'))
        <div></div>
        @endif

        @livewireScripts
    </body>
</html>
