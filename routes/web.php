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


//-- NOVELS --//
Route::get('/novels', [BookController::class, 'index'])->name('novel.index');
Route::get('/novels/{book:slug}', [BookController::class, 'show'])->name('novels.show');
// Novels dashboard
Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/novels', [BookController::class, 'indexDashboard'])->name('dashboard.novels');
Route::get('/dashboard/novels/create', [BookController::class, 'create'])->name('book.create');
Route::get('/dashboard/novels/{book:slug}', [BookController::class, 'showDashboard'])->name('dashboard.novels.book:slug');
Route::post('/dashboard/novels/store', [BookController::class, 'store']);
Route::get('/dashboard/novels/{book:slug}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/dashboard/novels/{book:slug}/update', [BookController::class, 'update']);
Route::post('/dashboard/novels/{book:slug}/destroy', [BookController::class, 'destroy']);

//-- CHAPTERS --//
Route::get('/novels/{book:slug}/chapter-{chapter:chapter_number}', [ChapterController::class, 'show'])->name('chapter.show');
Route::get('/dashboard/novels/{book:slug}/create', [ChapterController::class, 'create'])->name('chapter.create');
Route::post('/dashboard/novels/{book:slug}/store', [ChapterController::class, 'store']);
Route::get('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/edit', [ChapterController::class, 'edit'])->name('chapter.edit');
Route::patch('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/update', [ChapterController::class, 'update']);
Route::post('/dashboard/novels/{book:slug}/chapter-{chapter:chapter_number}/destroy', [ChapterController::class, 'destroy']);


//-- FORUM --//


//-- USER PROFILE --//
Route::get('/profile/{user:slug}', [UserController::class, 'show'])->name('profile.user:slug');
Route::get('/profile/{user:slug}/edit', [UserController::class, 'edit'])->name('profile.user:slug.edit');
Route::patch('/profile/{user:slug}/update', [UserController::class, 'update'])->name('profile.user:slug.update');


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
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::get('/register', [RegisterSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/register', [RegisterSessionController::class, 'store'])->middleware('guest')->name('register');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
// Password forgotten and reset
Route::get('/login/forgotten-password', [PasswordController::class, 'createForgottenPassword'])->middleware('guest')->name('forgotten-password');
Route::post('/login/forgotten-password', [PasswordController::class, 'storeForgottenPassword'])->middleware('guest');
Route::get('/reset-password/{token}', [PasswordController::class, 'createResetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'storeResetPassword'])->middleware('guest');

//-- AUTHOR DASHBOARD --//
