<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Language Switch Controllers
use App\Http\Controllers\LangController;

// Frontend Routes
use App\Livewire\Home;
use App\Livewire\Kirtan;
use App\Livewire\Parampara;

use App\Livewire\About\History;
use App\Livewire\About\MaharajJi;
use App\Livewire\About\NimbarkaSampradaya;

use App\Livewire\Philosophy\DvaitaAdvaita;
use App\Livewire\Philosophy\Sadhana;
use App\Livewire\Philosophy\Moksha;

use App\Livewire\Parampara\HarivyasNikunjaParampara\Nimbarkacharya as Nimbarkacharya;
use App\Livewire\Parampara\HarivyasNikunjaParampara\Keshavakashmiri as Keshavakashmiri;
use App\Livewire\Parampara\HarivyasNikunjaParampara\Bhattadev as Bhattadev;
use App\Livewire\Parampara\HarivyasNikunjaParampara\Harivyasdev as Harivyasdev;

use App\Livewire\Parampara\KathiyaBaba\KathiyaBaba;

use App\Livewire\DailyLife\Schedule;
use App\Livewire\DailyLife\Prasadam;
use App\Livewire\DailyLife\Rules;

use App\Livewire\Seva\SevaOpportunities;
use App\Livewire\Seva\AshramLife;
use App\Livewire\Seva\Donate;

use App\Livewire\SacredTexts\VedantaParijataSaurabha;
use App\Livewire\SacredTexts\DashaShloki;
use App\Livewire\SacredTexts\Mahavani;

use App\Livewire\Festivals;
use App\Livewire\Gallery;
use App\Livewire\DigitalMedia;
use App\Livewire\FaqFront;
use App\Livewire\Contact;

// Backend Controllers
use App\Http\Controllers\GalleryController;
use App\Livewire\Backend\FaqManager;
use App\Livewire\Backend\FaqForm;

Route::get('lang/{lang}', [LangController::class, 'switch'])->name('lang.switch');

Route::get('/', Home::class)->name('home');
Route::get('kirtan', Kirtan::class)->name('kirtan');
Route::get('parampara', Parampara::class)->name('parampara');

Route::get('history', History::class)->name('history');
Route::get('maharaj-ji', MaharajJi::class)->name('maharaj-ji');
Route::get('nimbarka-sampradaya', NimbarkaSampradaya::class)->name('nimbarka-sampradaya');

Route::get('dvaitaAdvaita', DvaitaAdvaita::class)->name('dvaitaAdvaita');
Route::get('sadhana', Sadhana::class)->name('sadhana');
Route::get('moksha', Moksha::class)->name('moksha');

// Harivyās Nikuñja Paramparā Routes
Route::prefix('parampara/harivyas-nikunja')->group(function () {
    Route::get('nimbarkacharya', Nimbarkacharya::class)->name('parampara.harivyas-nikunja.nimbarkacharya');
    Route::get('keshavakashmiri', Keshavakashmiri::class)->name('parampara.harivyas-nikunja.keshavakashmiri');
    Route::get('bhattadev', Bhattadev::class)->name('parampara.harivyas-nikunja.bhattadev');
    Route::get('harivyasdev', Harivyasdev::class)->name('parampara.harivyas-nikunja.harivyasdev');
});

// Nimbārkācārya Pīṭha Paramparā Routes
Route::prefix('parampara/nimbarkacharya-pitha')->group(function () {
    Route::get('nimbarkacharya', Nimbarkacharya::class)->name('parampara.nimbarkacharya-pitha.nimbarkacharya');
    Route::get('keshavakashmiri', Keshavakashmiri::class)->name('parampara.nimbarkacharya-pitha.keshavakashmiri');
    Route::get('bhattadev', Bhattadev::class)->name('parampara.nimbarkacharya-pitha.bhattadev');
});

// Kāṭhiyā Bābā Paramparā Route
Route::get('parampara/kathiya-baba/kathiya-baba', KathiyaBaba::class)->name('parampara.kathiya-baba.kathiya-baba');

Route::get('schedule', Schedule::class)->name('schedule');
Route::get('prasadam', Prasadam::class)->name('prasadam');
Route::get('rules', Rules::class)->name('rules');

Route::get('seva-opportunities', SevaOpportunities::class)->name('seva-opportunities');
Route::get('ashram-life', AshramLife::class)->name('ashram-life');
Route::get('donate', Donate::class)->name('donate');

Route::get('sacred_texts/vedanta-parijata-saurabha', VedantaParijataSaurabha::class)->name('sacred_texts.vedanta-parijata-saurabha');
Route::get('sacred_texts/dasha-shloki', DashaShloki::class)->name('sacred_texts.dasha-shloki');
Route::get('sacred_texts/mahavani', Mahavani::class)->name('sacred_texts.mahavani');

Route::get('festivals', Festivals::class)->name('festivals');
Route::get('gallery', Gallery::class)->name('gallery');
Route::get('digital-media', DigitalMedia::class)->name('digital-media');
Route::get('faq', FaqFront::class)->name('faq');
Route::get('contact', Contact::class)->name('contact');

// Backend Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'backend.dashboard')->name('dashboard');
    // Gallery Manager
    Route::resource('gallerymanager', GalleryController::class);
    Route::delete('/gallerymanager/{id}/trash', [GalleryController::class, 'trash'])->name('gallerymanager.trash');
    Route::patch('/gallerymanager/{id}/restore', [GalleryController::class, 'restore'])->name('gallerymanager.restore');
    // Faq Manager
    Route::get('faqmanager', FaqManager::class)->name('faqmanager');
    Route::get('/faqform', FaqForm::class)->name('faqform');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

