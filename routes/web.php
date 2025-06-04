<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Livewire\Home;
use App\Livewire\Kirtan;
use App\Livewire\Parampara;

use App\Livewire\About\History;
use App\Livewire\About\MaharajJi;
use App\Livewire\About\NimbarkaSampradaya;

use App\Livewire\Philosophy\DvaitaAdvaita;
use App\Livewire\Philosophy\RadhaKrishnaBhakti;
use App\Livewire\Philosophy\Sadhana;
use App\Livewire\Philosophy\Moksha;

use App\Livewire\Parampara\Acharyas\Nimbarkacharya;
use App\Livewire\Parampara\Acharyas\Shrinivyas;
use App\Livewire\Parampara\Acharyas\Keshavakashmiri;
use App\Livewire\Parampara\Acharyas\Bhattadev;
use App\Livewire\Parampara\Acharyas\Harivyasdev;
use App\Livewire\Parampara\Acharyas\FullLineage;

use App\Livewire\DailyLife\Schedule;
use App\Livewire\DailyLife\Prasadam;
use App\Livewire\DailyLife\Rules;

use App\Livewire\Seva\SevaOpportunities;
use App\Livewire\Seva\AshramLife;
use App\Livewire\Seva\Donate;

use App\Livewire\Texts\VedantaParijataSaurabha;
use App\Livewire\Texts\DashaShloki;
use App\Livewire\Texts\Mahavani;

use App\Livewire\Festivals;
use App\Livewire\Gallery;
use App\Livewire\DigitalMedia;
use App\Livewire\Faq;
use App\Livewire\Contact;

Route::get('/', Home::class)->name('home');
Route::get('kirtan', Kirtan::class)->name('kirtan');
Route::get('parampara', Parampara::class)->name('parampara');

Route::get('history', History::class)->name('history');
Route::get('maharaj-ji', MaharajJi::class)->name('maharaj-ji');
Route::get('nimbarka-sampradaya', NimbarkaSampradaya::class)->name('nimbarka-sampradaya');

Route::get('dvaitaAdvaita', DvaitaAdvaita::class)->name('dvaitaAdvaita');
Route::get('radha-krishna-bhakti', RadhaKrishnaBhakti::class)->name('radha-krishna-bhakti');
Route::get('sadhana', Sadhana::class)->name('sadhana');
Route::get('moksha', Moksha::class)->name('moksha');

Route::get('acharyas/nimbarkacharya', Nimbarkacharya::class)->name('acharyas.nimbarkacharya');
Route::get('acharyas/shrinivyas', Shrinivyas::class)->name('acharyas.shrinivyas');
Route::get('acharyas/keshavakashmiri', Keshavakashmiri::class)->name('acharyas.keshavakashmiri');
Route::get('acharyas/bhattadev', Bhattadev::class)->name('acharyas.bhattadev');
Route::get('acharyas/harivyasdev', Harivyasdev::class)->name('acharyas.harivyasdev');
Route::get('acharyas/full-lineage', FullLineage::class)->name('acharyas.full-lineage');

Route::get('schedule', Schedule::class)->name('schedule');
Route::get('prasadam', Prasadam::class)->name('prasadam');
Route::get('rules', Rules::class)->name('rules');

Route::get('seva-opportunities', SevaOpportunities::class)->name('seva-opportunities');
Route::get('ashram-life', AshramLife::class)->name('ashram-life');
Route::get('donate', Donate::class)->name('donate');

Route::get('texts/vedanta-parijata-saurabha', VedantaParijataSaurabha::class)->name('texts.vedanta-parijata-saurabha');
Route::get('texts/dasha-shloki', DashaShloki::class)->name('texts.dasha-shloki');
Route::get('texts/mahavani', Mahavani::class)->name('texts.mahavani');

Route::get('festivals', Festivals::class)->name('festivals');
Route::get('gallery', Gallery::class)->name('gallery');
Route::get('digital-media', DigitalMedia::class)->name('digital-media');
Route::get('faq', Faq::class)->name('faq');
Route::get('contact', Contact::class)->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('lang/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'hi'])) {
        abort(404);
    }
    session(['locale' => $lang]);
    app()->setLocale($lang);
    return back();
})->name('lang.switch');

require __DIR__.'/auth.php';
