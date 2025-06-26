<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

// Livewire components for the frontend
use App\Livewire\Frontend as F;
// Livewire components for the backend gallery management
use App\Livewire\Backend as B;
use App\Livewire\Backend\Gallery as BG;

// 🏠 Home
Route::get('/', F\Home::class)->name('home');

// ℹ️ About (flattened)
Route::get('/history', F\About\History::class)->name('history');
Route::get('/maharaj-ji', F\About\MaharajJi::class)->name('maharaj');
Route::get('/nimbarka-sampradaya', F\About\NimbarkaSampradaya::class)->name('sampradaya');

// 🧘 Ashram Life (flattened)
Route::get('/festivals', F\AshramLife\Festivals::class)->name('festivals');
Route::get('/schedule', F\AshramLife\Schedule::class)->name('schedule');
Route::get('/prasadam', F\AshramLife\Prasadam::class)->name('prasadam');
Route::get('/rules', F\AshramLife\Rules::class)->name('rules');
Route::get('/seva-opportunities', F\AshramLife\SevaOpportunities::class)->name('seva');
Route::get('/ashram-life', F\AshramLife\AshramLife::class)->name('ashram.life');
Route::get('/donate', F\AshramLife\Donate::class)->name('donate');

// 📿 Parampara
Route::get('/parampara/nimbarkacharya', F\Parampara\Nimbarkacharya::class)->name('parampara.nimbarkacharya');
Route::get('/parampara/keshavakashmiri', F\Parampara\Keshavakashmiri::class)->name('parampara.keshavakashmiri');
Route::get('/parampara/bhattadev', F\Parampara\Bhattadev::class)->name('parampara.bhattadev');
Route::get('/parampara/harivyasdev', F\Parampara\Harivyasdev::class)->name('parampara.harivyasdev');

// 📚 Resources (flattened to match nav)
Route::get('/sacred_texts/vedanta-parijata-saurabha', F\Resources\VedantaParijataSaurabha::class)->name('vedanta');
Route::get('/sacred_texts/dasha-shloki', F\Resources\DashaShloki::class)->name('dasha');
Route::get('/sacred_texts/mahavani', F\Resources\Mahavani::class)->name('mahavani');
Route::get('/kirtan', F\Resources\Kirtan::class)->name('kirtan');
Route::get('/dvaitaAdvaita', F\Resources\DvaitaAdvaita::class)->name('dvaitadvaita');
Route::get('/sadhana', F\Resources\Sadhana::class)->name('sadhana');
Route::get('/media', F\Resources\Media::class)->name('media');

// 🖼️ Misc
Route::get('/gallery', F\Gallery::class)->name('gallery');
Route::get('/faqs', F\FaqsList::class)->name('faqs');
Route::get('/contact', F\Contact::class)->name('contact');

// 🌐 Language switcher (if applicable)
Route::get('/language', F\LanguageSwitcher::class)->name('language');

// Backend Gallery Routes
Route::get('/gallery/posts/create', BG\CreatePostWithImages::class)->name('galleryManager.posts.create');
Route::get('/faqManager', B\FaqManagement::class)->name('faqManager');

Route::prefix('galleryManager')->name('galleryManager.')->group(function () {
    // Gallery Dashboard
    // Gallery Posts
    Route::get('posts', BG\GalleryPost\Index::class)->name('posts.index');
    // Route::get('posts/create', BG\GalleryPost\Create::class)->name('posts.create');
    Route::get('posts/{post}/edit', BG\GalleryPost\Edit::class)->name('posts.edit');
    Route::get('posts/{post}', BG\GalleryPost\Show::class)->name('posts.show');

    // Gallery Images
    Route::get('images', BG\GalleryImage\Index::class)->name('images.index');
    Route::get('images/create', BG\GalleryImage\Create::class)->name('images.create');
    Route::get('images/{image}/edit', BG\GalleryImage\Edit::class)->name('images.edit');
    Route::get('images/{image}', BG\GalleryImage\Show::class)->name('images.show');

    // Comments
    Route::get('comments', BG\Comment\Index::class)->name('comments.index');
    Route::get('comments/create', BG\Comment\Create::class)->name('comments.create');
    Route::get('comments/{comment}/edit', BG\Comment\Edit::class)->name('comments.edit');
    Route::get('comments/{comment}', BG\Comment\Show::class)->name('comments.show');

    // Likes
    Route::get('likes', BG\Like\Index::class)->name('likes.index');
    Route::get('likes/create', BG\Like\Create::class)->name('likes.create');
    Route::get('likes/{like}/edit', BG\Like\Edit::class)->name('likes.edit');
    Route::get('likes/{like}', BG\Like\Show::class)->name('likes.show');
});
// Route::get('/phpinfo', function () {
//     phpinfo();
// });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
