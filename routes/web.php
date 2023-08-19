<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/committee', [PageController::class, 'committee'])->name('committee');
Route::get('/ethical-approval/application-checklist', [PageController::class, 'applicationChecklist'])->name('application-checklist');
Route::get('/ethical-approval/application-forms', [PageController::class, 'applicationForms'])->name('application-forms');
Route::get('/ethical-approval/apply', [PageController::class, 'apply'])->name('apply');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/ethical-approval/send-application', [PageController::class, 'sendApplication'])->name('send-application');
