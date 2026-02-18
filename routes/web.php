<?php

use App\Livewire\Auth\Unsubscribe;
use App\Livewire\Admin\Projects\ProjectIndex;
use App\Livewire\Admin\Projects\ProjectCreate;
use App\Livewire\Admin\Projects\ProjectEdit;
use App\Livewire\Admin\Reviews\ReviewIndex;
use App\Livewire\Admin\Reviews\ReviewCreate;
use App\Livewire\Admin\Reviews\ReviewEdit;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('profile', function () {
    return view('home.portfolio');
})->name('portfolio');

Route::get('vtadmin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('vtadmin/visitors', function () {
    return view('admin.visitors');
})->middleware(['auth','verified'])->name('visitors');

Route::get('vtadmin/mesages', function () {
    return view('admin.messages');
})->middleware(['auth','verified'])->name('messages');

Route::get('vtadmin/newsletter', function () {
    return view('admin.newsletter');
})->middleware(['auth','verified'])->name('newsletter');

Route::get('vtadmin/responses', function () {
    return view('admin.responses');
})->middleware(['auth','verified'])->name('responses');

Route::get('vtadmin/portfolio', function () {
    return view('admin.portfolio');
})->middleware(['auth','verified'])->name('view_portfolio');

// Projects Management Routes
Route::middleware(['auth', 'verified'])->prefix('vtadmin')->group(function () {
    // Projects
    Route::get('projects', ProjectIndex::class)->name('admin.projects.index');
    Route::get('projects/create', ProjectCreate::class)->name('admin.projects.create');
    Route::get('projects/{project}/edit', function (Project $project) {
        return view('admin.projects.edit', compact('project'));
    })->name('admin.projects.edit');
    
    // Reviews
    Route::get('reviews', ReviewIndex::class)->name('admin.reviews.index');
    Route::get('reviews/create', ReviewCreate::class)->name('admin.reviews.create');
    Route::get('reviews/{review}/edit', function (Review $review) {
        return view('admin.reviews.edit', compact('review'));
    })->name('admin.reviews.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('vtadmin/run-migrations', function () {
    Artisan::call('migrate --seed');
    return 'Migrations and seeders have been run.';
});

Route::get('unsubscribe', function () {
    return view('home.unsubscribe');
})->name('unsubscribe');

Route::get('mail', function () {
    return view('mail.template');
})->name('mail');


Route::get('storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created.';
})->name('storage-link');

Route::get('clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Cache cleared successfully.';
})->name('clear-cache');

require __DIR__.'/auth.php';