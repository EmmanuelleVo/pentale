<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccessibilityController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AuthorDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\RegisterSessionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//-- HOME --//
Route::get('/', [HomeController::class, 'index'])->name('home');

//-- ABOUT --//
Route::get('/about', AboutController::class)->name('about');


//-- CONTACT SUPPORT --//
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


//-- NOVELS --//
Route::get('/novels', [BookController::class, 'index'])->name('novel.index');
Route::get('/novels/{book:slug}', [BookController::class, 'show'])->name('novels.show');
// Novels dashboard
Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/novels', [BookController::class, 'indexDashboard'])->name('dashboard.novels');
Route::get('/dashboard/novels/create', [BookController::class, 'create'])->name('book.create');
Route::get('/dashboard/novels/{book:slug}', [BookController::class, 'showDashboard'])->name('dashboard.novels.book:slug');
Route::post('/dashboard/novels/store', [BookController::class, 'store']);
Route::get('/dashboard/novels/{book:slug}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/dashboard/novels/{book:slug}/update', [BookController::class, 'update']);
Route::post('/dashboard/novels/{book:slug}/destroy', [BookController::class, 'destroy']);

//-- REVIEWS --//
Route::post('/novels/{book:slug}/review/store', [ReviewController::class, 'store']);

//-- CHAPTERS --//
Route::get('/novels/{book:slug}/chapter-{chapter:chapter_number}', [ChapterController::class, 'show'])->name('chapter.show');
Route::get('/dashboard/novels/{book:slug}/create', [ChapterController::class, 'create'])->name('chapter.create');
Route::post('/dashboard/novels/{book:slug}/store', [ChapterController::class, 'store']);
Route::get('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
Route::patch('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/update', [ChapterController::class, 'update']);
Route::post('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/destroy', [ChapterController::class, 'destroy']);

// DASHBOARD
Route::get('/dashboard/reviews', [AuthorDashboardController::class, 'indexReviews'])->middleware(['auth', 'verified'])->name('dashboard.reviews');
Route::get('/dashboard/comments', [AuthorDashboardController::class, 'indexComments'])->middleware(['auth', 'verified'])->name('dashboard.comments');
Route::get('/dashboard/profile/{user:slug}/edit', [UserController::class, 'editDashboard'])->name('dashboard.profile.user:slug.edit');

//-- FORUM --//


//-- USER PROFILE --//
Route::middleware('auth')->group(function () {
    Route::get('/profile/{user:slug}', [UserController::class, 'show'])->name('profile.user:slug');
    Route::get('/profile/{user:slug}/edit', [UserController::class, 'edit'])->name('profile.user:slug.edit');
    Route::patch('/profile/{user:slug}/update', [UserController::class, 'update'])->name('profile.user:slug.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
    //Dashboard
    Route::get('/dashboard/profile/{user:slug}/edit', [UserController::class, 'editDashboard'])->name('profile.edit.dashboard');
    Route::patch('/dashboard/profile/{user:slug}/update', [UserController::class, 'update'])->name('profile.update');
});


//-- NOTIFICATIONS --//


//-- SEARCH --//
Route::get('/search', SearchController::class);


//-- USER LIBRARY --//
Route::get('/library', LibraryController::class);


//-- PRIVACY POLICY AND TERMS & CONDITIONS --//
Route::get('/privacy-policy', PrivacyPolicyController::class)->name('privacy-policy');
Route::get('/terms-and-conditions', TermsAndConditionsController::class)->name('terms-and-conditions');
//-- ACCESSIBILITY --//
Route::get('/accessibility', AccessibilityController::class)->name('accessibility');



//-- CONNECTION --//
require __DIR__.'/auth.php';
