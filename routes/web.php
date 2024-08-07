<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ReviewController;

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

// guest
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// check reminder make abstract url so only developer know it
// add "yourdomain/$2a$12$0BSE1CUyzO/.Gcs8lodQa.RnCBl7QidTJSo4Q0dAbVV.2Pr4LlSr6" into cron-job.org
// run it every 2 hours
// Route::get('/$2a$12$0BSE1CUyzO/.Gcs8lodQa.RnCBl7QidTJSo4Q0dAbVV.2Pr4LlSr6', [ReminderController::class, 'checkReminder']);
Route::get('/2a120BSE1CUyzOGcs8lodQaRnCBl7QidTJSo4Q0dAbVV2Pr4LlSr6', [ReminderController::class, 'checkReminder']);

// check icon
Route::get('/icon', [IconController::class, 'index']);

// loged in
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::delete('/profile/photo', [ProfileController::class, 'destroyPhoto'])->name('profile.destroy.photo');
});

// verified
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('category', CategoryController::class)->except(['show']);
    Route::resource('account', AccountController::class)->except(['show']);
    Route::resource('reminder', ReminderController::class)->except(['show']);

    Route::resource('transaction', TransactionController::class)->except(['show', 'edit', 'create']);
    Route::get('/transaction/create/expense', [TransactionController::class, 'createExpense'])->name('transaction.create.expense');
    Route::get('/transaction/create/income', [TransactionController::class, 'createIncome'])->name('transaction.create.income');
    Route::get('/transaction/{transaction}/edit/expense', [TransactionController::class, 'editExpense'])->name('transaction.edit.expense');
    Route::get('/transaction/{transaction}/edit/income', [TransactionController::class, 'editIncome'])->name('transaction.edit.income');
    Route::get('/transaction/trash', [TransactionController::class, 'trash'])->name('transaction.trash');
    Route::post('/transaction/trash/{transaction}', [TransactionController::class, 'restore'])->withTrashed()->name('transaction.trash.restore');
    Route::delete('/transaction/trash/{transaction}', [TransactionController::class, 'destroyPermanently'])->withTrashed()->name('transaction.trash.destroyPermanently');
    Route::get('transaction/export/pdf', [TransactionController::class, 'exportPDF'])->name('transaction.export.pdf');
});

// auth superadmin
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::resource('faq', FaqController::class)->except(['show']);
    Route::resource('feature', FeatureController::class)->except(['show']);
    Route::resource('review', ReviewController::class)->except(['show']);
    Route::resource('benefit', BenefitController::class)->except(['show']);
});

require __DIR__ . '/auth.php';
